@extends('layouts.app')

@section('title', 'Add Appointment')

@section('content')

    <div class="container mt-4">

        <div class="card">

            <div class="card-header">
                <h4>Add Appointment</h4>
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

                <form action="{{ route('appointments.store') }}" method="POST">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Patient
                        </label>

                        <select name="patient_id" class="form-control">

                            <option value="">
                                -- Select Patient --
                            </option>

                            @foreach($patients as $patient)

                                <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>

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

                            <option value="">
                                -- Select Doctor --
                            </option>

                            @foreach($doctors as $doctor)

                                <option value="{{ $doctor->id }}" {{ old('doctor_id') == $doctor->id ? 'selected' : '' }}>

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

                        <input type="date" name="appointment_date" value="{{ old('appointment_date') }}"
                            class="form-control">

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Status
                        </label>

                        <select name="status" class="form-control">

                            <option value="">
                                -- Select Status --
                            </option>

                            <option value="Pending">
                                Pending
                            </option>

                            <option value="Confirmed">
                                Confirmed
                            </option>

                            <option value="Completed">
                                Completed
                            </option>

                            <option value="Cancelled">
                                Cancelled
                            </option>

                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">

                        Save Appointment

                    </button>

                    <a href="{{ route('appointments.index') }}" class="btn btn-secondary">

                        Cancel

                    </a>

                </form>

            </div>

        </div>

    </div>

@endsection