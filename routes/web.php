<?php

use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RentalController;
use App\Http\Controllers\Frontend\CarFrnController;
use App\Http\Controllers\Frontend\PageController;


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

Route::get('/reantal-page', [CarFrnController::class, 'index'])->name('reantalPage.index');
Route::get('/reantal-details/{id}', [CarFrnController::class, 'showCarDetails'])->name('reantalPage.details');

// About Page
// Route::view('/about', 'about')->name('about');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {



    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Customer Dashboard Route
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('/customer/dashboard', [DashboardController::class, 'customerDashboard'])->name('customer.dashboard');
    Route::get('/customerTest/test', [DashboardController::class, 'test'])->name('customerTest.Test');
    // Route::get('/rentals', [CustomerController::class, 'rentals'])->name('customers.rental');
    Route::get('/customers/rental', [CustomerController::class, 'rentals'])->name('customers.rental');
    Route::get('/rentalHistory', [CustomerController::class, 'rentalHistory'])->name('customers.rentalHistory');
    Route::delete('/rental/{id}', [CustomerController::class, 'delete'])->name('customers.rental.destroy');


});

// Admin Dashboard Route
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/cars', [CarController::class, 'index'])->name('admin.cars.index');
    Route::post('/cars/store', [CarController::class, 'store'])->name('admin.cars.store');
    Route::get('/cars/{id}/edit', [CarController::class, 'edit'])->name('admin.cars.edit');
    Route::put('/cars/{id}/update', [CarController::class, 'update'])->name('admin.cars.update');
    Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('admin.cars.destroy');
//customer
    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
    Route::post('/customers/store', [CustomerController::class, 'store'])->name('admin.customers.store');
    Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
    Route::put('/customers/{id}/update', [CustomerController::class, 'update'])->name('admin.customers.update');
    Route::get('/customers/{id}/show', [CustomerController::class, 'show'])->name('admin.customers.show');
//rental  ==
    Route::get('/rentals', [RentalController::class, 'index'])->name('admin.rentals.index');
    Route::get('/rentals/create', [RentalController::class, 'create'])->name('admin.rentals.create');
    Route::post('/rentals/store', [RentalController::class, 'store'])->name('admin.rentals.store');
    Route::delete('/rentals/{id}', [RentalController::class, 'destroy'])->name('admin.rentals.destroy');
    Route::get('/rentals/{id}/edit', [RentalController::class, 'edit'])->name('admin.rentals.edit');
    Route::put('/rentals/{id}/update', [RentalController::class, 'update'])->name('admin.rentals.update');
    Route::get('/rentals/{id}/show', [RentalController::class, 'show'])->name('admin.rentals.show');



    Route::get('/admin/test', [DashboardController::class, 'test'])->name('admin.test');




});


