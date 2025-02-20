<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $rentals = Rental::with(['user', 'car'])->latest()->get();
        return view('dashboard.admin.rentals.index', compact('rentals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $users = User::all();
        $cars = Car::all();
        return view('dashboard.admin.rentals.create',compact('users', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        //dd($request->all());
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        $start = \Carbon\Carbon::createFromFormat('m/d/Y', $request->start_date);
        $end = \Carbon\Carbon::createFromFormat('m/d/Y', $request->end_date);

        //  $difference = $start->diffInDays($end);
         $cars = Car::find($request->car_id);
         $total_cost=$cars->daily_rent_price*$start->diffInDays($end);

         Rental::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'start_date' => $start,
            'end_date' => $end,
            'total_cost' => $total_cost,
            'status' => $request->status,
        ]);
        toastr()->success('Rental Add SuccessFully !!');
        return redirect()->route('admin.rentals.index');
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



