<?php

use App\Http\Controllers\dropdownController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\IndigencyController;
use App\Http\Controllers\ResidencyController;
use App\Http\Controllers\JobSeekerController;

Route::get('/', function () {
    return view('landingPage');
})->name('landingPage');

//about us page
Route::get('/aboutUsPage', function () { return view('aboutUsPage'); })->name('aboutUsPage');

//login routes
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//register 
Route::get('/register', [dropdownController::class, 'create'])->name('register');
Route::post('/register', [ResidentController::class, 'store'])->name('resident.store');


//admin routes
Route::get('/admin/dashboard', function () { return view('dashboard'); })->name('admin.dashboard');
Route::get('/admin/residents', [dropdownController::class, 'adminCreate'])->name('admin.residents');
Route::get('/admin/officials', function () { return view('officials'); })->name('admin.officials');

//indigency
Route::get('/admin/indigency', function () { return view('indigency'); })->name('admin.indigency');
//add indigency req
Route::get('/indigency/search', [IndigencyController::class, 'searchResident']);
Route::post('/indigency/add', [IndigencyController::class, 'addIndigency']);
Route::get('/indigency/get/{id}', [IndigencyController::class, 'getRequest']);
Route::post('/indigency/updateStatus/{id}', [IndigencyController::class, 'updateStatus']);
Route::get('/indigency/load', [IndigencyController::class, 'loadRequests']);
//show indigency req
Route::get('/indigency/load', [IndigencyController::class, 'loadRequests']);
//delete indigency req
Route::delete('/indigency/delete/{id}', [IndigencyController::class, 'deleteRequest']);

//residency
Route::get('/admin/residency', function () { return view('residency'); })->name('admin.residency');
//add residency req
Route::get('/residency/search', [ResidencyController::class, 'search']);
Route::post('/residency/store', [ResidencyController::class, 'store']);
Route::patch('/residency/status/{id}', [ResidencyController::class, 'updateStatus']);
//show residency req
Route::get('/residency/load', [ResidencyController::class, 'load']);
Route::get('/residency/view/{id}', [ResidencyController::class, 'view']);
//delete residency req
Route::delete('/residency/delete/{id}', [ResidencyController::class, 'delete'])->name('residency.delete');


//jobseeker
Route::get('/admin/jobseeker', function () { return view('jobseeker'); })->name('admin.jobseeker');
//show jobseeker req
Route::prefix('jobseeker')->group(function () {
    Route::get('/search', [JobSeekerController::class, 'searchResident']); 
    Route::post('/add', [JobSeekerController::class, 'addJobSeeker']);     
});
Route::get('/jobseeker/view/{id}', [JobSeekerController::class, 'view']);
Route::get('/jobseeker/load', [JobSeekerController::class, 'load']);
//update jobseeker reqstatus
Route::post('/jobseeker/updateStatus/{id}', [JobSeekerController::class, 'updateStatus']);
//delete jobseeker req
Route::delete('/jobseeker/delete/{id}', [JobSeekerController::class, 'delete']);


//add resident
Route::post('/admin/residents/store', [ResidentController::class, 'store'])->name('admin.residents.store');
//update resident
Route::post('/admin/residents/update/{id}', [ResidentController::class, 'update']);
//delete resident
Route::delete('/admin/residents/delete/{id}', [ResidentController::class, 'destroy']);
//show resident details
Route::get('/admin/residents/list', [ResidentController::class, 'list'])->name('admin.residents.list');
Route::get('/admin/residents/view/{id}', [ResidentController::class, 'show']);
//verify resident
Route::post('/admin/residents/verify/{id}', [ResidentController::class, 'verify']);