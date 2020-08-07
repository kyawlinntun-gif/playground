@extends('layouts.master')

@section('title', 'Register Form')

@section('content')

    <div class="register-form">

        <div class="container">

            <div class="row mt-3">

                <div class="col-6 offset-3">
                    
                    <h1>Register Form</h1>

                    <form action="{{ url('register') }}" method="POST">

                        @csrf

                        <div class="form-group">

                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') ? old('name') : '' }}">

                        </div>

                        @include('messages.errors.name')

                        <div class="form-group">

                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{ old('username') ? old('username') : '' }}">

                        </div>

                        @include('messages.errors.username')

                        <div class="form-group">

                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') ? old('email') : '' }}">

                        </div>

                        @include('messages.errors.email')

                        <div class="form-group">

                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password">

                        </div>

                        @include('messages.errors.password')

                        <div class="form-group">

                            <label for="confirm_password">Confirm Password</label>
                            <input type="password" id="confirm_password" class="form-control" name="confirm_password">

                        </div>

                        @include('messages.errors.confirm_password')

                        <input type="submit" class="btn btn-primary">

                    </form>

                </div>

            </div>

        </div>
        
    </div>

@endsection