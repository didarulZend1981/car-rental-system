<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function customerDashboard()
    {
        return view('dashboard.customer');
    }

    public function adminDashboard()
    {
        return view('dashboard.admin');
    }

    
}
