@extends('layouts.admin.main')
@section('title','Manage Account')
@section('main-content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-success text-white me-2">
            <i class="mdi mdi-settings"></i>
            </span> Password Configuration
        </h3>
    </div>

    @include('common.admin.pop-ups.returnMessage')

    <div class="container d-flex justify-content-center">
        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-center">Change Password</h4>
              <form class="forms-sample" action="{{ route('admin.change.password') }}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Current Password </label>
                  <input type="password" name="current" class="form-control @error('current') invalid  @enderror"  placeholder="********">
                  @error('current')
                    <span style="color:red; font-size:12px">*{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">New Password </label>
                    <input type="password" name="password" class="form-control @error('password') invalid  @enderror"  placeholder="********">
                    @error('password')
                      <span style="color:red; font-size:12px">*{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password </label>
                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') invalid  @enderror"  placeholder="********">
                @error('password_confirmation')
                    <span style="color:red; font-size:12px">*{{ $message }}</span>
                @enderror
                </div>
                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                <a class="btn btn-light" href="{{ route('admin.dashboard') }}">Cancel</a>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
