<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// Web Routes
Route::resource('companies', CompanyController::class);
Route::resource('employees', EmployeeController::class);
// Authentication Routes
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('register', function () {
    return view('auth.register');
});

Route::post('register', function () {
    return view('welcome');
});

// Handle Login
Route::post('login', function (Request $request) {
    // Ensure User model is imported at the top
    $user = \App\Models\User::where('email', 'admin@admin.com')->first();
    if ($user && Hash::check('password', $user->password)) {
        return redirect('companies');
    }
    // Optionally handle failed login
    return back()->withErrors(['email' => 'Invalid credentials.']);
});
