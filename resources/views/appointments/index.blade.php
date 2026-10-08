@extends('layouts.app')

@section('title', 'Appointments')

@section('content')

    <div class="container mt-4">

        <h3>List of Appointments</h3>

        <a href="{{ route('appointments.create') }}" class="btn btn-primary mb-3">
            Add Appointment
        </a>

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif

        <table class="table table-bordered table-striped">

            <thead class="table-primary">

                <tr>
                    <th>Patient</th>
                    <th>Doctor</th>
                    <th>Appointment Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>

            </thead>

            <tbody>

                @forelse($appointments as $appointment)

                    <tr>

                        <td>
                            {{ $appointment->patient->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->doctor->name ?? 'N/A' }}
                        </td>

                        <td>
                            {{ $appointment->appointment_date }}
                        </td>

                        <td>
                            {{ $appointment->status }}
                        </td>

                        <td>

                            <a href="{{ route('appointments.edit', $appointment->id) }}" class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this appointment?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center">
                            No appointments found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection