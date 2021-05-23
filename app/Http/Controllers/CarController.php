<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\CarTransmission;
use App\Category;
use App\CarGroup;
use App\Helpers\ImageHelper as HelperImage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return view('admin.car.index', ['cars' => $cars]);
    }

    public function create()
    {
        $car = new Car;
        $categories = Category::all();
        $car_groups = CarGroup::all();
        $carTransmissions = CarTransmission::all();
		return view('admin.car.carForm', [
            'mode' => 'create', 
            'car' => $car, 
            'carTransmissions' => $carTransmissions,
            'categories' => $categories, 
            'car_groups' => $car_groups
            ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
			$filename = HelperImage::uploadImage($request, 'image/car', 'image');
			$input['photo_url'] = $filename;
        }

        $car = new Car;
    
        $car->name = $input['name'];
        $car->uls_dugaar = $input['uls_dugaar'];
        $car->car_group_id = $input['car_group_id'];
        $car->car_trans_id = $input['car_trans_id'];
        $car->fuel = $input['fuel'];
        $car->seat = $input['seat'];
        $car->uild_on = $input['uild_on'];
        $car->price_per_day = $input['price_per_day'];
        if (array_key_exists('photo_url', $input))
        {
        $car->photo_url = $input['photo_url'];
        }
        $car->save();
        
        return redirect('admin/car')->with('status', 'Car created!');
    }

    public function edit($id)
    {
        $car = Car::find($id);
        $carTransmissions = CarTransmission::all();
        $categories = Category::all();
        $car_groups = CarGroup::all();
        return view('admin.car.carForm', [
            'mode' => 'edit', 
            'car' => $car, 
            'carTransmissions' => $carTransmissions,
            'categories' => $categories, 
            'car_groups' => $car_groups
            ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
            $filename = HelperImage::uploadImage($request, 'image/car', 'image');
            $input['photo_url'] = $filename;
            $car = Car::find($id);
            if ($car->photo_url !== null) {
                HelperImage::unlinkImage($car->photo_url);
            }
        }

		$car = Car::findOrFail($id);
        $car->name = $input['name'];
        $car->uls_dugaar = $input['uls_dugaar'];
        $car->car_group_id = $input['car_group_id'];
        $car->car_trans_id = $input['car_trans_id'];
        $car->fuel = $input['fuel'];
        $car->seat = $input['seat'];
        $car->uild_on = $input['uild_on'];
        $car->price_per_day = $input['price_per_day'];
        if (array_key_exists('photo_url', $input))
        {
        $car->photo_url = $input['photo_url'];
        }
        $car->save();

		return redirect('admin/car')->with('status', 'Car updated!');
    }

    public function destroy($id)
    {
        if (Car::destroy($id))
		{
			return response()->json([
				'title' => 'Deleted!',
				'body' => '',
				'carId' => $id
			]);
		} else {
			return response()->json([
				'title' => 'Failed!',
				'body' => '',
				'carId' => ''
			]);
		}
    }
}
