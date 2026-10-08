<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;


class DashboardController extends Controller
{
    public function index() {
        $patientCount = Patient::count();
        $doctorCount = Doctor::count();
        $appointmentCount = Appointment::count();

        return view('dashboard', compact(
            'patientCount',
            'doctorCount',
            'appointmentCount'
        )); 
    }
}
