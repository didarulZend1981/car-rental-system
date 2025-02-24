<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarFrnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){

        $query = Car::where('availability', 1)->with('rentals');

        // Filter by car type if provided
        if ($request->has('car_type') && $request->car_type) {
            $query->where('car_type', $request->car_type);
        }
        if ($request->has('brand') && $request->brand) {
            $query->where('brand', $request->brand);
        }
        // Search by car name or price if provided
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')->orWhere('daily_rent_price', 'like', '%' . $search . '%');
            });
        }

        // Paginate the results
        $cars = $query->orderBy('id', 'desc')->paginate(3);




        return view('frontend.rentals',compact('cars'));


    }

    public function showCarDetails($id){

        $cars = Car::where('availability', 1)->latest()->limit(4)->get();

        $car_details = Car::findOrFail($id);

        return view('frontend.details',compact('cars','car_details'));
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
