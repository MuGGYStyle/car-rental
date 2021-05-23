<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CarGroup;
use App\Category;
use App\Helpers\ImageHelper as HelperImage;

class CarGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $car_groups = CarGroup::all();
        return view('admin.car_group.index', ['car_groups' => $car_groups]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $car_group = new CarGroup;
        return view('admin.car_group._form', ['mode' => 'create', 'categories' => $categories, 'car_group' => $car_group]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->hasFile('image')) {
			$filename = HelperImage::uploadImage($request, 'image/car_group', 'image');
			$input['photo_url'] = $filename;
        }

        $car_group = new CarGroup;
        $car_group->name = $input['name'];
        $car_group->price_per_day = $input['price_per_day'];
        $car_group->category_id = $input['category_id'];
        if (array_key_exists('photo_url', $input))
        {
        $car_group->photo_url = $input['photo_url'];
        }
        $car_group->save();

        return redirect('admin/car_group')->with('status', 'Group created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $car_group = CarGroup::find($id);
        return view('admin.car_group._form', ['mode' => 'edit', 'categories' => $categories, 'car_group' => $car_group]);
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
        $input = $request->all();
        $car_group = CarGroup::findOrFail($id);
        if ($request->hasFile('image')) {
            $filename = HelperImage::uploadImage($request, 'image/car_group', 'image');
            $input['photo_url'] = $filename;
            if ($car_group->photo_url !== null) {
                HelperImage::unlinkImage($car_group->photo_url);
            }
        }

		
        $car_group->name = $input['name'];
        $car_group->price_per_day = $input['price_per_day'];
        $car_group->category_id = $input['category_id'];
        if (array_key_exists('photo_url', $input))
        {
        $car_group->photo_url = $input['photo_url'];
        }
        $car_group->save();

		return redirect('admin/car_group')->with('status', 'Group updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (CarGroup::destroy($id))
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
