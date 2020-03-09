<?php

use ascio\db\v2\OrderDb;
use ascio\lib\Workflow;
use ascio\service\v2\OrderStatusType;
use ascio\v2\ArrayOfOrder;
use ascio\v2\Domain;
use ascio\v2\Order;
use ascio\v2\QueueItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/api/domain/{id}', function (Request $request,$id) {
    $domain = new Domain();
    $domain->getById($id);
    return response($domain->toJson())->header('Content-Type', "application/json");
});
Route::get('/api/domain/getByName/{name}', function (Request $request,$name) {
    $domain = new Domain();
    try {
        $domain->db()->getByName($name);
    } catch (ModelNotFoundException $e) {
        $domain->api()->get($name);
    }
    return response($domain->toJson())->header('Content-Type', "application/json");
});
Route::get('/api/domain/getByHandle/{handle}', function (Request $request,$handle) {
    $domain = new Domain();
    $domain->db()->getByName($handle);
    return response($domain->toJson())->header('Content-Type', "application/json");
});
Route::post('/api/domain', function (Request $request)  {
    $domain = new Domain();
    $domain->deserialize(json_decode($request->getContent()));
    $domain->db()->createDbProperties();
    return response($domain->register()->toJson())->header('Content-Type', "application/json");
});
Route::put('/api/domain/{id}', function (Request $request,$id) {
    $domain = new Domain();
    $domain->getById($id);
    $domain->deserialize(json_decode($request->getContent()));
    $wf = new Workflow($domain);
    $wf->getSubmitOptions()->setAutoUnlock(true);
    $wf->addTasks($domain->getUpdateOrders());
    $result = $wf->submit();
    return response(json_encode($result))->header('Content-Type', "application/json");
});

Route::middleware('auth:api')->get('/api/order/{id}', function (Request $request,$id) {
    $order = new Order();
    $order->getById($id);
    return response($order->toJson())->header('Content-Type', "application/json");
});
Route::get('/orders','OrderController@orders')->name('order.orders');