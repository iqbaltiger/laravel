@extends('layouts.master')
<!-- resources/views/auth/login.blade.php -->

@section('content')
<center><h1 class="text-danger">Login</h1><br/></center>
<div class="col-md-3"></div>
<div class="col-md-9">
        @if(Session::has('success'))
    <div class="alert alert-success">
        <h2>{{ Session::get('success') }}</h2>
    </div>
@endif
<form class="form-horizontal" method="POST" action="/auth/login" novalidate>
    {!! csrf_field() !!}
    
  

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email:</label>
    <div class="col-sm-10 col-md-5">
      <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email')}}">
       @if ($errors->has('email')) <p class="text-danger">{{ $errors->first('email') }}</p> @endif
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password:</label>
    <div class="col-sm-10 col-md-5">
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
      @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 col-md-4">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="remember"> Remember me
        </label>
      </div>
    </div>
  </div>
    
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 col-md-4">
            
            <input type="radio" name="userType" value="student"><label>Student</label>
            <input type="radio" name="userType" value="teacher"><label>Teacher</label>
        </div>
    </div>    
    
    
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10 col-md-4">
      <button type="submit" class="btn btn-default btn-success">Sign in</button>
      <button type="button" class="btn btn-default btn-primary">Facebook</button>
    </div>
  </div>
</form>

</div>


@endsection