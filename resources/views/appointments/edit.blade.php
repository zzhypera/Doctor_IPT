@extends('layouts.app')

@section('title', 'Edit Appointment')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h4>Edit Appointment</h4>
            </div>

            <div class="card-body">

                @if($errors->any())

                    <div class="alert alert-danger">

                        <ul>

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif

                <form action="{{ route('appointments.update', $appointment->id) }}" method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label class="form-label">
                            Patient
                        </label>

                        <select name="patient_id" class="form-control">

                            @foreach($patients as $patient)

                                <option value="{{ $patient->id }}" {{ $appointment->patient_id == $patient->id ? 'selected' : '' }}>

                                    {{ $patient->name }}
                                    - {{ $patient->student_id }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Doctor
                        </label>

                        <select name="doctor_id" class="form-control">

                            @foreach($doctors as $doctor)

                                <option value="{{ $doctor->id }}" {{ $appointment->doctor_id == $doctor->id ? 'selected' : '' }}>

                                    Dr. {{ $doctor->name }}
                                    - {{ $doctor->specialization }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Appointment Date
                        </label>

                        <input type="date" name="appointment_date"
                            value="{{ old('appointment_date', $appointment->appointment_date) }}" class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-control">

                            <option value="Pending" {{ $appointment->status == 'Pending' ? 'selected' : '' }}>
                                Pending
                            </option>

                            <option value="Confirmed" {{ $appointment->status == 'Confirmed' ? 'selected' : '' }}>
                                Confirmed
                            </option>

                            <option value="Completed" {{ $appointment->status == 'Completed' ? 'selected' : '' }}>
                                Completed
                            </option>

                            <option value="Cancelled" {{ $appointment->status == 'Cancelled' ? 'selected' : '' }}>
                                Cancelled
                            </option>

                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">

                        Update Appointment

                    </button>

                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

@endsection