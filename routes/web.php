<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Dns\Zone;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    return view('dashboard');
});
Route::get('/dns', function () {
    //phpinfo();
    return view('dns.zones');
});
Route::get('/dns/zone/{zoneName}', Zone::class);
Route::get('/home', [HomeController::class, "index"])->name('home');
Auth::routes();
