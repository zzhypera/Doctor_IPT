@extends('layouts.app')

@section('content')
    <div>
        <h1>This is the Dashboard Page!</h1>

        <h2>Total Doctors: {{ $doctorCount }}</h2>
    </div>
@endsection