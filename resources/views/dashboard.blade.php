@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

    <div class="dashboard">
        <div class="container mt-4">
            <div class="row">
                <div class="col-10 offset-1">
                    @include('messages.success.success')
                    @include('messages.errors.fail')
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles</th>
                                <th scope="col">Assign Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <form action={{ url('roles/assign') }} method="POST" id="assign_role{{ $user->id }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" {{-- name="roles[]" value="user" --}} name="user"
                                                    {{-- @if($user->roles->pluck('name')->first() == 'A custom user')
                                                        checked
                                                    @endif --}}
                                                    @foreach ($user->roles->pluck('name') as $name)
                                                        {{ $name == 'A custom user' ? 'checked' : '' }}
                                                    @endforeach
                                                >User
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" {{-- name="roles[]" value="author" --}} name='author'
                                                    {{-- @if($user->roles->pluck('name')->first() == 'Author')
                                                        checked
                                                    @endif --}}
                                                    @foreach ($user->roles->pluck('name') as $name)
                                                        {{ $name == 'Author' ? 'checked' : '' }}
                                                    @endforeach
                                                >Author
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" {{-- name="roles[]" value="admin" --}} name='admin'
                                                    {{-- @if($user->roles->pluck('name')->first() == 'Admin')
                                                        checked
                                                    @endif --}}
                                                    @foreach ($user->roles->pluck('name') as $name)
                                                        {{ $name == 'Admin' ? 'checked' : '' }}
                                                    @endforeach
                                                >Admin
                                            </label>
                                        </form>
                                    </td>
                                    <td><a class="badge badge-pill badge-primary" href="#" onclick='event.preventDefault; document.getElementById("assign_role{{ $user->id }}").submit();'>Assing role</a></td>
                                </tr> 
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection