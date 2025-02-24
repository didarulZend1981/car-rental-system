<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalFrnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $carId){

        // $request->validate([
        //     'start_date' => 'required|date|after_or_equal:today',
        //     'end_date' => 'required|date|after:start_date',
        // ]);

        // $car = Car::findOrFail($carId);
        // // dd($car);


        // // Check if the car is available for the selected period
        // $exists = Rental::where('car_id', $carId)
        //     ->where(function ($query) use ($request) {
        //         $query->whereBetween('start_date', [$request->start_date, $request->end_date])
        //               ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
        //     })
        //     ->exists();

        // if ($exists) {
        //     return back()->with('error', 'The car is not available for the selected dates.');
        // }

        // // Calculate total price based on rental days
        // $days = (strtotime($request->end_date) - strtotime($request->start_date)) / 86400;
        // $totalPrice = $days * $car->daily_rent_price;

        // // Create booking
        // Rental::create([
        //     'user_id' => Auth::id(),
        //     'car_id' => $carId,
        //     'start_date' => $request->start_date,
        //     'end_date' => $request->end_date,
        //     'total_cost' => $totalPrice,
        //     'status' => 'pendding',
        // ]);

        // return redirect()->route('home')->with('success', 'Car booked successfully!');









        $messages = [
            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'start_date.after_or_equal' => 'The start date cannot be before today.',

            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after' => 'The end date must be greater than the start date.',
        ];

        // Validation Rules
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
        ], $messages);

        // Find the car
        $car = Car::findOrFail($carId);

        // Check if the car is available for the selected period
        $exists = Rental::where('car_id', $carId)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                      ->orWhereBetween('end_date', [$request->start_date, $request->end_date]);
            })
            ->exists();

        if ($exists) {
            return back()->with('error', '🚫 The car is not available for the selected dates.');
        }

        // Calculate total price based on rental days
        $days = (strtotime($request->end_date) - strtotime($request->start_date)) / 86400;
        $totalPrice = $days * $car->daily_rent_price;

        // Create booking
        Rental::create([
            'user_id' => Auth::id(),
            'car_id' => $carId,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'total_cost' => $totalPrice,
            'status' => 'pendding',
        ]);

        return redirect()->route('home')->with('success', '🎉 Car booked successfully!');
















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
