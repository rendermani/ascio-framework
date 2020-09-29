<?php

namespace App\Http\Controllers;

use App\Http\Resources\Zone as ResourcesZone;
use App\Http\Resources\Zones;
use ascio\db\dns\ZoneDb;
use ascio\dns\ArrayOfRecord;
use ascio\dns\ArrayOfSearchZoneClause;
use ascio\dns\SearchOperatorType;
use ascio\dns\SearchZoneClause;
use ascio\dns\SearchZoneField;
use ascio\dns\Zone;
use ascio\lib\Ascio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = ZoneDb::orderBy('created_at', 'desc')->paginate(5);
        foreach($zones as $zone) {
            $zone->removeEmptyFields();
        }
        return Zones::collection($zones);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $zone = new Zone();
        $zone->setZoneName($request->input('name')); 
        $zone->produce();
        Ascio::getClientDns()->createZone(
            $request->input('name'),
            Auth::user()->getAuthIdentifierName(), 
            new ArrayOfRecord()
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        $zone = Ascio::getClientDns()->getZone($name);
        return new ResourcesZone($zone->getZone());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function edit($name)
    {
        $zone = Ascio::getClientDns()->getZone($name);
        return new ResourcesZone($zone);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zone = new Zone();
        $zone->getById($id);            
        $zone->produce(["action" => "delete"]);
        Ascio::getClientDns()->deleteZone($zone->getZoneName());
        return json_encode(["code" => 200]); 
        
    }
    public function sync() {
        $clauses = new ArrayOfSearchZoneClause();
        $clause = new SearchZoneClause();
        $clause
            ->setSearchZoneField(SearchZoneField::ZoneName)
            ->setOperator(SearchOperatorType::Like)
            ->setValue("*");
        $clauses->add($clause);
        $results = Ascio::getClientDns()->searchZoneNames($clauses);
        $zones = [];
        foreach($results->getZoneNames() as $name) {
            $zone = Ascio::getClientDns()->getZone($name)->getZone();
            $zone->produce();
        }
        return $zones; 
    }
}
