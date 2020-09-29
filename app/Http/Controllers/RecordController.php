<?php

namespace App\Http\Controllers;

use App\Http\Resources\Record as ResourcesRecord;
use ascio\dns\Record;
use ascio\lib\Ascio;
use ascio\lib\ValidationException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RecordController extends Controller
{
    protected function rules ($type) {
        return [
        'Source' => ['required', 'max:255', Rule::requiredIf($type=="SRV")],
        'Target' => ['required', 'max:255'],
        'TTL' => ['max:255'],
        'Port' => ['max:255','numberic', Rule::requiredIf($type=="SRV")],
        'Priority' => ['max:255','numberic'],
        'Serial' => ['max:255','numberic'],
        'Weight' => ['max:255','numberic', Rule::requiredIf($type=="SRV")],
        'Id' => ['max:255','numberic'],
        'Expire' => ['max:255','numberic', Rule::requiredIf($type=="SOA")],
        'HostmasterEmail' => ['max:255', Rule::requiredIf($type=="SOA")],
        'Retry' => ['max:255','numberic', Rule::requiredIf($type=="SOA")],
        'Refresh' => ['max:255','numberic', Rule::requiredIf($type=="SOA")],
        'SerialUsage' => ['max:255','numberic', Rule::requiredIf($type=="SOA")],
        'PrimaryNameServer' => ['max:255', Rule::requiredIf($type=="SOA")]
        ];
    }
    protected function createRecord(Request $request) : Record {
        $type = $request->input('type');         
        $class = "\\ascio\\dns\\".$type;
        if(!class_exists($class)) {
            throw (new ValidationException($class." does not exist"))
            ->setObjectName($request->input('ZoneName'));
        }
        $validatedData = $request->validateWithBag(
            'put',
            $this->rules($type)
        );        
        if(count($validatedData) > 0 ) {
            throw (new ValidationException("Record not validated", 406))
            ->setObjectName($request->input('ZoneName'))
            ->setErrors($validatedData);
        } ;
        $record = new $class();
        $record->setSource($request->input('Source'));
        $record->setTarget($request->input('Target'));
        $record->setTTL($request->input('TTL'));
        $record->setPort($request->input('Port'));
        $record->setPriority($request->input('Priority'));
        $record->setSerial($request->input('Serial'));
        $record->setWeight($request->input('Weight'));
        $record->setId($request->input('id'));
        $record->setExpire($request->input('Expire'));
        $record->setHostmasterEmail($request->input('HostmasterEmail'));
        $record->setExpire($request->input('Expire'));
        $record->setRetry($request->input('Retry'));
        $record->setRefresh($request->input('Refresh'));
        $record->setSerialUsage($request->input('SerialUsage'));
        $record->setPrimaryNameServer($request->input('PrimaryNameServer'));
        return $record;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $record = $this->createRecord($request);
        $dbRecord = (new Record())->db()->getByHandle($record->getId());
        $record->db()->_id = $dbRecord->db()->getKey();
        $record->produce(["action" => "update"]);
        $result = Ascio::getClientDns()->createRecord($request->input("ZoneName"),$record);
        $record->setId($result->getRecordId());
        return new ResourcesRecord($record);   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record = Ascio::getClientDns()->getRecord($id);
        return new ResourcesRecord($record);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $record = $this->createRecord($request);
        $dbRecord = (new Record())->db()->getByHandle($record->getId());
        $record->db()->_id = $record->getId();
        $record->produce(["action" => "update"]);
        Ascio::getClientDns()->updateRecord($record);
        return true;         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return bool
     */
    public function destroy($id)
    {
        $record = new Record();
        $record->db()->getByHandle($id);
        $record->produce(["action" => "delete"]);
        Ascio::getClientDns()->deleteRecord($id);
        return json_encode(["code" => 200]); 
    }
}
