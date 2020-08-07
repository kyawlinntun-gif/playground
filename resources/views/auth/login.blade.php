@extends('layouts.master')

@section('title', 'Login Form')

@section('content')

    <div class="login-form">

        <div class="container">

            <div class="row mt-3">

                <div class="col-6 offset-3">

                    @include('messages.errors.fail')
                    
                    <h1>Login Form</h1>

                    <form action="{{ url('login') }}" method="POST">

                        @csrf

                        <div class="form-group">

                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username" value="{{ old('username') ? old('username') : '' }}">

                        </div>

                        @include('messages.errors.username')

                        <div class="form-group">

                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password">

                        </div>

                        @include('messages.errors.password')

                        <input type="submit" class="btn btn-primary">

                    </form>

                </div>

            </div>

        </div>
        
    </div>

@endsection