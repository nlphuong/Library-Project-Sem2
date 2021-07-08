@extends('layout.app')
@section('title','Register')
@section('main')
<div class="about-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="abouttitle">
            <h2>Registration</h2>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Give Us Your Information</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
            <div class="row">
              <div class="col-md-10 offset-md-1">
                    <div class="form-group">
                      <label for="exampleInputName">Full Name</label>
                      <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Your Name" required name="fullname" value="{{old('fullname')}}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" pattern=".{8,}" class="form-control" id="password" placeholder="Password" required name="password">
                    </div>
                    @error('password')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                      <label for="confirm_password">Confirm Password</label>
                      <input type="password" pattern=".{8,}" class="form-control" id="confirm_password" placeholder="Confirm Password" required name="confirm_password">
                    </div>
                    @error('confirm_password')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
                    <div class="form-group">
                      <label for="gender">Gender</label><br>
                      <input type="radio" name="gender" value="1" checked>  Male
                      <input type="radio" name="gender" value="2">  Female
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" id="address" placeholder="Address" required name="address" value="{{old('address')}}">
                    </div>
                    <div class="form-group">
                      <label for="birthday">Birthday</label>
                      <input type="date" class="form-control" id="birthday" name="birthday" required value="{{old('birthday')}}">
                    </div>
                    <div class="form-group">
                      <label for="phone">Phone Number</label>
                      <input type="text" pattern="[0-9]{8,14}" class="form-control" id="phone" placeholder="Phone"  required name="phone" value="{{old('phone')}}">
                    </div>
              </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-md-10 offset-md-1">
              <button type="submit" class="btn btn-violet">Submit</button>
              <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </div>
      </form>
    </div>
</div>
@endsection
