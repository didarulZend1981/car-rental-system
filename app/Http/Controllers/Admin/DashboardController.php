<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function customerDashboard()
    {
        $cars = Car::where('availability', 1)->count();

        $rent_count = Rental::where('status', 'ongoing')->count();
        return view('dashboard.customer',compact('cars','rent_count'));
    }

    public function adminDashboard()
    {
        // $car_count = Car::where('status', 1)->count();
        $cars = Car::where('availability', 1)->count();
        $customer_count = User::where('role', 'customer')->count();
        $rent_count = Rental::where('status', 'ongoing')->count();
        $total_earning = Rental::where('status', 'completed')->sum('total_cost');


        return view('dashboard.admin',compact('customer_count','rent_count','total_earning','cars'));
    }

    public function test()
    {
        return view('dashboard.test');
    }

}
