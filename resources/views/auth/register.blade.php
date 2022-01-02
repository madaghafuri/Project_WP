@extends('layouts.auth')

@section('form-content')
    <h1 class="bg-primary mb-0 rounded p-3">Register Page</h1>
    <form action="{{route('register-post')}}" class="bg-light shadow p-5 rounded" method="POST">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}
                <a href="/login" class="btn btn-outline-success">Login</a>
            </div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
        @endif
        @csrf
        <div class="form-floating mb-3">
          <input type="text" id="username" class="form-control" name="username" value="{{old('username')}}">
          <label for="username" class="form-label">Username</label>
            <span style="color: #ba5d6f">@error('username')
                {{$message}}
            @enderror</span>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="fullname" id="fullname" class="form-control" value="{{old('password')}}">
          <label for="fullname" class="form-label">Fullname</label>
            <span style="color: #ba5d6f">@error('fullname')
                {{$message}}
            @enderror</span>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" name="password" value="{{old('password')}}">
          <label for="password" class="form-label">Password</label>
            <span style="color: #ba5d6f">@error('password')
                {{$message}}
            @enderror</span>
        </div>
        <div class="form-floating mb-3">
          <select name="roles" id="roles" class="form-control">
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>
          </select>
          <label for="roles" class="form-label">Roles</label>
            <span style="color: #ba5d6f">@error('roles')
                {{$message}}
            @enderror</span>
        </div>
        <div class="form-floating mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection