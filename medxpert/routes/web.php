<?php

use Illuminate\Support\Facades\Route;
use App\Models\doctor_details;
use App\Models\Appointment;
use App\Http\Controllers\AppointmentController;

Route::get('/doctor', function () {
    $doctors = doctor_details::whereHas('user', function ($query) {
        $query->where('role', 'doctor');
    })->with('user')->get();

    $appointments = Appointment::where('status', 'pending')->get();

    return view('doctor', ['doctors' => $doctors, 'appointments' => $appointments]);
});

Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::post('/appointments/book', [AppointmentController::class, 'book'])->name('appointments.book');

Route::get('/', function () {
    return view('admindashboard.index');
});

route::get('/admindashboard',function(){
    return view ('admindashboard.index');
})->name('dash');

route::get('/doctors',function(){
    return view ('admindashboard.doctors.index');
})->name('doc');

route::get('/patient',function(){
    return view ('admindashboard.patient.index');
})->name('pat');