<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = User::latest()->get();
        // return view('pages.index',compact('customers'));
        return view('dashboard.admin.customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function createPage() {
        // return view('dashboard.admin.customers.create');
    }

    public function create()
    {
        return view('dashboard.admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        toastr()->success('Customer Add SuccessFully !!');
        return redirect()->route('admin.customers.index');


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
        $customer = User::where('id',$id)->first();
        return view('dashboard.admin.customers.edit',['customer'=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',

        ]);
        User::where('id',$id)->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
        ]);
        toastr()->success('Customer update SuccessFully !!');
        return redirect()->route('admin.customers.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id',$id)->delete();
        toastr()->success('Customer Delete SuccessFully !!');
        return redirect()->route('admin.customers.index');
    }


}
