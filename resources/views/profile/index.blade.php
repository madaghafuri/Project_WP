@extends('layouts.base')

@section('page-content')
  <div class="d-flex flex-row rounded-3 shadow">
    <div class="w-25">
      <div class="d-flex flex-row justify-content-start gap-3 p-4">
        <h5><i class="bi bi-person-circle"></i></h5>
        <h5>Profile</h5>
      </div>
    </div>
    <div class="w-75 p-4">
      <h3 class="mb-4">{{auth()->user()->username}} Profile</h3>
      <form action="{{route('profile.update', auth()->user()->id)}}" method="POST" class="form-control d-flex flex-column gap-4">
        @method('put')
        <div class="d-flex flex-row gap-4">
          <div id="left" class="w-50">
            <div>
              <label for="" >Username</label>
              <input disabled type="text" class="form-control" value="{{auth()->user()->username}}">
            </div>
            <div>
              <label for="">Full Name</label>
              <input name="fullname" class="form-control" type="text" value="{{auth()->user()->fullname}}">
            </div>
          </div>
          <div id="right" class="w-50">
            <label for="">Photos</label>
            <img src="" alt="">
          </div>
        </div>
        <div>
          <label for="">Current Password</label>
          <input name="current_password" type="password" class="form-control">
        </div>
        <div>
          <label for="">New Password</label>
          <input name="new_password" type="password" class="form-control">
        </div>
        <div>
          <label for="">Confirm New Password</label>
          <input name="confirm_password" type="password" class="form-control">
        </div>
        <div class="d-flex flex-row justify-content-end mt-2">
          <button class="btn btn-secondary">Update Profile</button>
        </div>
      </form>
    </div>
  </div>
@endsection
