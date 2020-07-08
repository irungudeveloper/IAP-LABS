<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class Cars extends Controller
{
    //

	public function displayAll()
	{
		
		$car = Car::all();

		return view('display')->with('data',$car);

	}

	public function create(Request $request)
	{
		
		$car = new Car;

		$request->validate([

			'make'=>'required',
			'model'=>'required',
			'image'=>'required',
			'year'=>'required'

		]);

		$car->make = $request->make;
		$car->model = $request->model;
		$car->image = $request->image;
		$car->year = $request->year;

		$car->save();

		return redirect()->route('display');

	}

	public function edit($id)
	{

		$car = Car::find($id);

		return view('edit')->with('data',$car);

	}

	public function update(Request $request, $id)
	{
		$car = Car::find($id);

		$car->make = $request->make;
		$car->model = $request->model;
		// $car->image = $request->
		$car->year = $request->year;

		$car->save();

		return redirect()->route('display');

	}

	public function delete($id)
	{
		$car = Car::find($id);

		$car->delete();

		return redirect()->route('display');

	}

}
