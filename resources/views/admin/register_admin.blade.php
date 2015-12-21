@extends('layouts.master')


@section('content')
<div class="col-md-3">

</div>

<div class="col-md-6">
    @if(Session::has('success'))
    <div class="alert alert-success">
        <h2>{{ Session::get('success') }}</h2>
    </div>
@endif
     <center><h2>Admin Registration Form</h2></center>
     <form method="POST" action="/saveAdminUser" id="register_student" novalidate>
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="exampleInputEmail1">Name:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name" value="{{old('name')}}">
             @if ($errors->has('name')) <p class="text-danger">{{ $errors->first('name') }}</p> @endif
        </div>
        
        

        <div class="form-group">
            <label for="exampleInputEmail1">Gender:</label>
            <label class="radio-inline">
                <input type="radio" name="gender" id="inlineRadio1" value="male">Male
            </label>
            <label class="radio-inline">
                <input type="radio" name="gender" id="inlineRadio1" value="female">Female
            </label>
            @if ($errors->has('gender')) <p class="text-danger">{{ $errors->first('gender') }}</p> @endif
        </div> 
        
        <div class="form-group">
            <label for="exampleInputEmail1">Age:</label>
            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="Age" name="age" value="{{old('age')}}">
             @if ($errors->has('age')) <p class="text-danger">{{ $errors->first('age') }}</p> @endif
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail1">Email:</label>
            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{old('email')}}" name="email">
             @if ($errors->has('email')) <p class="text-danger">{{ $errors->first('email') }}</p> @endif
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Phone No:</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Phone No" name="phone_number">
            @if ($errors->has('phone_number')) <p class="text-danger">{{ $errors->first('phone_number') }}</p> @endif
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
            @if ($errors->has('password')) <p class="text-danger">{{ $errors->first('password') }}</p> @endif
        </div>
        
        <div class="form-group">
            <label for="exampleInputPassword1">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirm Password" name="password_confirmation">
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>

<div class="col-md-3">

</div>

@endsection