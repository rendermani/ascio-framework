<?php

use ascio\lib\Workflow;
use ascio\v2\Domain;
use ascio\v2\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes q
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/', function (Request $request) {
    return "get root";
});
Route::get('/domain/{id}', function (Request $request,$id) {
    $domain = new Domain();
    $domain->getById($id);
    return response($domain->toJson())->header('Content-Type', "application/json");
});
Route::get('/domain/getByName/{name}', function (Request $request,$name) {
    $domain = new Domain();
    try {
        $domain->db()->getByName($name);
    } catch (ModelNotFoundException $e) {
        $domain->api()->get($name);
    }
    return response($domain->toJson())->header('Content-Type', "application/json");
});
Route::get('/domain/getByHandle/{handle}', function (Request $request,$handle) {
    $domain = new Domain();
    $domain->db()->getByName($handle);
    return response($domain->toJson())->header('Content-Type', "application/json");
});
Route::post('/domain', function (Request $request)  {
    $domain = new Domain();
    $domain->deserialize(json_decode($request->getContent()));
    $domain->db()->createDbProperties();
    return response($domain->register()->toJson())->header('Content-Type', "application/json");
});
Route::put('/domain/{id}', function (Request $request,$id) {
    $domain = new Domain();
    $domain->getById($id);
    $domain->deserialize(json_decode($request->getContent()));
    $wf = new Workflow($domain);
    $wf->getSubmitOptions()->setAutoUnlock(true);
    $wf->addTasks($domain->getUpdateOrders());
    $result = $wf->submit();
    return response(json_encode($result))->header('Content-Type', "application/json");
});

Route::middleware('auth:api')->get('/order/{id}', function (Request $request,$id) {
    $order = new Order();
    $order->getById($id);
    return response($order->toJson())->header('Content-Type', "application/json");
});