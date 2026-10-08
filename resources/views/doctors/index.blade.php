@extends('layouts.app')

@section('content')
    <h3>List of Doctors</h3>
   
    <a href="{{ route('doctors.create') }}"
    class="btn btn-primary">
    Add Doctor
</a>

@if(session('success'))

<div class="alert alert-success">
    {{ session('success') }}
</div>

@endif

<table>
 <thead>
    <tr>
        <th>Name</th>
        <th>Specialization</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
 </thead>

 <tbody>
    @foreach($doctors as $doctor)
    <tr>
        <td>{{ $doctor->name }}</td>
        <td>{{ $doctor->specialization }}</td>
        <td>{{ $doctor->email }}</td>
        <td>{{ $doctor->phone }}</td>
        <td>
            <a href="{{ route('doctors.edit', $doctor->id) }}" class="btn btn-warning">Edit</a>

            <form
            action="{{ route('doctors.destroy', $doctor->id) }}"
            method="POST"
            class="d-inline">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger"
            onClick="return confirm('Are you sure you want to delete this doctor?')">Delete</button>
            </form>
        </td>
        
    </tr>
    @endforeach

</table>

@endsection