<?php

use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;
use \App\DataTables\CarDataTable ;

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

Route::get('/', function () {
  return view('index');
})->name('index');

/** route user */
Route::group(['prefix' => 'cars', 'as' => 'car.'], function () {
  Route::get('/index', [CarsController::class, 'index'])->name('index');

  /******************************** to create new car ********************************/
  Route::get('create', [CarsController::class, 'create'])->name('create');
  Route::post('create', [CarsController::class, 'action_create'])->name('action_create');
  /******************************** to edit the car ********************************/
  Route::get('/{id}', [CarsController::class, 'edit'])->name('edit');
  Route::post('/{id}', [CarsController::class, 'action_edit'])->name('action_edit');
  /******************************** to delete the car ********************************/
  Route::get('/{id}', [CarsController::class, 'delete'])->name('delete');

//  Route::get('/index', function(CarDataTable $dataTable) {
//    return $dataTable->render(route('index'));
//  });



});
