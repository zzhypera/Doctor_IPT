@extends('layouts.app')

@section('title', 'Add Doctor')

@section('content')

<h4>Add Doctor</h4>

@if($errors->any())
<div class="alert alert-danger">
    <ul>
    @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('doctors.store') }}" method="POST">
    @csrf
     <div class="mb-3"></div>
    <label for="name" class="form-label">Name</label>
    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

    </div>
     <div class="mb-3"></div>
    <label for="specialization" class="form-label">Specialization</label>
    <input type="text" class="form-control" name="specialization" value="{{ old('specialization') }}">
    </div>

     <div class="mb-3"></div>
    <label for="email" class="form-label">Email</label>
    <input type="text" class="form-control" name="email" value="{{ old('email') }}">

    </div>

     <div class="mb-3"></div>
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

    </div>

    <button type="submit" class="btn btn-primary">Save Doctor</button>
    <a href="{{ route('doctors.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection