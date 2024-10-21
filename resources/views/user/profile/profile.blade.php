@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile User</h1>
    <div class="card">
        <div class="card-header">
            Profile Details
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            {{-- Add more fields as necessary --}}
        </div>
    </div>
</div>
@endsection
