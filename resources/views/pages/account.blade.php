<!-- resources/views/pages/account.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-5 text-center">
    <h1>Account</h1>
    <a href="{{ route('login') }}" class="btn btn-primary m-2">Login</a>
    <a href="{{ route('register') }}" class="btn btn-secondary m-2">Register</a>
</div>
@endsection
