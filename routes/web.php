<?php

/*namespace App/Http/Controllers/Auth;*/

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\Auth\UserRegisterController;
use App\Http\Controllers\Auth\Verify;
use App\Http\Controllers\BillsController;
use App\Http\Controllers\LandlordController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\TenantController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/lordzapp/home', function () {
    return view('home');
})->name('home');

Route::get('', function () {
    return redirect()->route('home');
});

//Register
Route::get('/lordzapp/register', [UserRegisterController::class, 'index'])->name('register');

Route::post('/lordzapp/register-landlord', [UserRegisterController::class, 'RegisterLandlord'])->name('register.landlord');

Route::post('/lordzapp/register-tenant', [UserRegisterController::class, 'RegisterTenant'])->name('register.tenant');

//Login
Route::get('/lordzapp/login', [UserLoginController::class, 'index'])->name('login');
Route::post('/lordzapp/login', [UserLoginController::class, 'login']);

//Landlord dashboard
Route::get('/lordzapp/landlord/dashboard', [LandlordController::class, 'index'])->name('landlord');

// Tenant dashboard
Route::get('/lordzapp/tenant/dashboard', [TenantController::class, 'index'])->name('tenant');

// Logout
Route::post('/lorddzapp/logout', [UserLoginController::class, 'logout'])->name('logout');

// Rentals
Route::get('/lordzapp/landlord/rentals', [RentalController::class, 'index'])->name('rental');
Route::get('/lordzapp/landlord/rentals/add', [RentalController::class, 'rentalForm'])->name('add.rental');
Route::post('/lordzapp/landlord/rentals/add', [RentalController::class, 'createRental'])->name('add.rental');
Route::get('/lordzapp/landlord/rentals/edit/{rental}', [RentalController::class, 'editRentalForm'])->name('edit.rental');
Route::post('/lordzapp/landlord/rentals/edit/{rental}', [RentalController::class, 'editRental'])->name('edit.rental');

// Show tenants
Route::get('lordzapp/tenants', [TenantController::class, 'landlord_tenants'])->name('tenants.view');

// Add tenants
Route::get('lordzapp/add/tenant-to-rental/{rental}', [TenantController::class, 'add_tenant'])->name('add.tenant');
Route::post('lordzapp/add/tenant/{user}/to/rental/{rental}', [TenantController::class, 'update_tenant'])->name('update.tenant');

// Rent due
Route::get('lordzapp/rent-due', [BillsController::class, 'index'])->name('rent.due');

// Pay rent
Route::get('lordzapp/pay-rent', [BillsController::class, 'rent_index'])->name('rent');
Route::post('lordzapp/pay-rent-to/{bill}', [BillsController::class, 'pay_rent'])->name('rent.pay');

// Reciepts
Route::get('lordzapp/reciepts', [BillsController::class, 'reciept'])->name('reciept');
Route::get('lordzapp/reciepts/download/{reciept}', [BillsController::class, 'pdf'])->name('pdf');

// History
Route::get('lordzapp/bills-history', [BillsController::class, 'bills_index'])->name('history');
Route::get('lordzapp/bills-history/download', [BillsController::class, 'download_bills'])->name('download.bills');

// Verify phone number
Route::get('lordzapp/verfiy/phone-number/{phone_number}', [Verify::class, 'verify'])->name('verify');
Route::post('lordzapp/verfiy/phone-number', [Verify::class, 'post_code'])->name('post.code');
