<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        {
            $cars = Car::all();
            return view('dashboard.admin.car.index', compact('cars'));

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'car_type' => 'required',
            'daily_rent_price' => 'required|numeric',
            'availability' => 'required|boolean',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $imagePath = $request->file('image') ? $request->file('image')->store('cars', 'public') : null;



        Car::create(array_merge($request->all(), ['image' => $imagePath]));
        // dd($a);
        // $cars = Car::all();
        // dd($cars);

        // return response()->json(['success' => 'Car added successfully!']);
        return redirect()->route('admin.cars.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        // return response()->json($car);

        return response()->json([
            'id' => $car->id,
            'name' => $car->name,
            'brand' => $car->brand,
            'model' => $car->model,
            'year' => $car->year,
            'car_type' => $car->car_type,
            'daily_rent_price' => $car->daily_rent_price,
            'availability' => $car->availability,
            'image' => $car->image ? asset('storage/' . $car->image) : null
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $car = Car::findOrFail($id);

        // dd($request->all());
        // if ($request->hasFile('image')) {
        //     $imagePath = $request->file('image')->store('cars', 'public');

        //     $car->image = $imagePath;
        // }

        $car->update($request->except('image'));

        // Image Upload
        if ($request->hasFile('image')) {
            if ($car->image) {
                Storage::delete('public/' . $car->image); // Delete old image
            }

            $imagePath = $request->file('image')->store('car_images', 'public');
            $car->image = $imagePath;
            $car->save();
        }



        return response()->json(['success' => 'Car updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Car::findOrFail($id)->delete();
        return response()->json(['success' => 'Car deleted successfully!']);
    }
}
