<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    /**
     * Display a listing of patients.
     */
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new patient.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created patient.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|unique:patients,student_id',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer'
        ]);

        Patient::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient added successfully.');
    }

    /**
     * Show the form for editing a patient.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update a patient.
     */
    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'student_id' => 'required|unique:patients,student_id,' . $patient->id,
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required|integer'
        ]);

        $patient->update([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    /**
     * Delete a patient.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}
