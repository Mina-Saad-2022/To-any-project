<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use App\DataTables\CarDataTable;

class CarsController extends Controller
{
  public function index(CarDataTable $dataTable)
  {
//    dd($row);
    return $dataTable->render('cars.index');
  }

  public function action_create(Request $request)
  {
    $data = $request->only([
      'brand',
      'model',
      'year'
    ]);
    $rules = [
      'brand' => 'required|max:5',
      'model' => 'required',
      'year' => 'required',
    ];
    $messages = [
      'brand.required' => 'brand is required',
      'brand.max' => 'brand shouldn.t exceed 5 characters',
      'model.required' => 'model is required',
      'year.required' => 'year is required',
    ];
    Car::create([
      'brand' => $request->brand,
      'model' => $request->model,
      'year' => $request->year,
    ]);
    return redirect(route('car.index'))->with(["create" => ["Title", "body text"]]);
  }


  /**************************************** to edit car in database ****************************************/
  public function edit($id)
  {
    $edit_car = Car::findOrFail($id);
    return view('cars.edit', compact('edit_car'));
  }

  public function action_edit(Request $request, $id)
  {
    Car::findOrFail($id)->update([
      'brand' => $request->brand,
      'model' => $request->model,
      'year' => $request->year,
    ]);
    return redirect(route('cars.index'))->with(["edit" => ["Title", "body text"]]);
  }

  /**************************************** to delete car in database ****************************************/

  public function delete($id)
  {
    Car::findOrFail($id)->delete();
    return redirect(route('Cars.index'))->with(["delete" => ["Title", "body text"]]);
  }

}
