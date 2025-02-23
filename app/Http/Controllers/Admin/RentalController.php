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
    public function checkBooking(Request $request){
        $startDate = \Carbon\Carbon::parse($request->start_date)->toDateString();
        $endDate = \Carbon\Carbon::parse($request->end_date)->toDateString();

        // dd($request->all());
        return Rental::where('car_id', $request->car_id)
            ->whereNotIn('status', ['completed', 'cancelled']) // Only active bookings
            ->where(function ($query) use ($startDate, $endDate) {
                $query->where(function ($q) use ($startDate, $endDate) {
                    $q->whereBetween('start_date', [$startDate, $endDate])
                      ->orWhereBetween('end_date', [$startDate, $endDate]);
                })
                ->orWhere(function ($q) use ($startDate, $endDate) {
                    $q->where('start_date', '>=', $startDate)
                      ->where('end_date', '<=', $endDate);
                });
            })
            ->exists();  // Changed from get() to exists()
    }


    public function carCheckSatus(Request $request){
        $check=Rental::where('car_id', $request->car_id)
            ->whereNotIn('status', ['completed', 'cancelled']) // Only active bookings
            ->where('start_date', $request->car_id)
            ->where('end_date', $request->car_id)
            ->first();


    }

    public function store(Request $request){
        // dd($request->all());
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:pendding,ongoing,completed,canceled',
        ]);


        $start = \Carbon\Carbon::createFromFormat('m/d/Y', $request->start_date);
        $end = \Carbon\Carbon::createFromFormat('m/d/Y', $request->end_date);

        //  $difference = $start->diffInDays($end);
         $cars = Car::find($request->car_id);
         $total_cost=$cars->daily_rent_price*$start->diffInDays($end);

        // dd($total_cost);

         $isBooking=$this->checkBooking($request);
        // dd($isBooking);

         if ($isBooking){

             toastr()->success('car all ready Booking !!');
            // return redirect()->route('aadmin.rentals.create');
            return redirect()->route('admin.rentals.index');
         }

        // if(!$isRended)

       Rental::create([
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'start_date' => $start,
            'end_date' => $end,
            'total_cost' => $total_cost,
            'status' => $request->status,
        ]);

        // Car::where('id', $request->car_id)->update([

        //     'status' => $request->input('status'),

        // ]);



        // return back()->with('success', 'Car booked successfully!');

        toastr()->success('Rental Add SuccessFully !!');
        return redirect()->route('admin.rentals.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rental = Rental::findOrFail($id);

        // dd($rental);
        return view('dashboard.admin.rentals.show', compact('rental'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id){
        $users = User::all();
        $cars = Car::all();
        $rental = Rental::findOrFail($id);
        return view('dashboard.admin.rentals.edit', compact('rental', 'users', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id){
        //  dd($request->all());
        $start = \Carbon\Carbon::createFromFormat('Y-m-d', $request->start_date);
        $end = \Carbon\Carbon::createFromFormat('Y-m-d', $request->end_date);

        // Find Car & Check
        $car = Car::find($request->car_id);
        if (!$car) {
            return back()->withErrors(['car_id' => 'Selected car not found!']);
        }

        // Calculate Total Cost
        $total_cost = $car->daily_rent_price * $start->diffInDays($end);

        // Validation
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'status' => 'required|in:ongoing,completed,canceled',
        ]);

        // Update Rental
        Rental::where('id', $id)->update([
            'user_id' => $request->input('user_id'),
            'car_id' => $request->input('car_id'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'status' => $request->input('status'),
            'total_cost' => $total_cost,
        ]);

        toastr()->success('Customer updated successfully!');
        return redirect()->route('admin.rentals.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id){
        Rental::where('id',$id)->delete();
        toastr()->success('Rentals Delete SuccessFully !!');
        return redirect()->route('admin.rentals.index');
    }




}



