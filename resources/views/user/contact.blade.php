@extends('layout.appIndex')
@section('title','Contact')
@section('body-class','contact-page')
@section('main')

<div class="about-bg">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="abouttitle">
          <h2>Contact Us</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Contact -->
<div class="Contact">
  <div class="container">
    <div class="row">
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        @if(Session::get('success'))
        <div class="alert alert-success">{{Session::get('success')}}</div>
        @endif
        @if(Session::get('fail'))
        <div class="alert alert-danger">{{Session::get('fail')}}</div>
        @endif
        <form action="" method="POST">
          @csrf
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <input class="form-control" placeholder="Name" name="name" type="text" value="{{old('name')}}">
              <span style="color:red">@error('name'){{$message}} @enderror</span>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <input class="form-control" placeholder="sophie@example.com" name="email" type="Email" value="{{old('email')}}">
              <span style="color:red">@error('email'){{$message}} @enderror</span>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <input class="form-control" placeholder="Phone Number" name="phone" type="text"
                value="{{old('phone_nu')}}">
              <span style="color:red">@error('phone'){{$message}} @enderror</span>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
              <input class="form-control" placeholder="Subject" name="subject" type="text" value="{{old('subject')}}">
              <span style="color:red">@error('subject'){{$message}} @enderror</span>
            </div>
            <div class="col-sm-12">
              <textarea class="textarea" name="message" placeholder="Message"></textarea>
            </div>
          </div>
          <button class="send-btn" type="submit">Send</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div>


  <!-- end Contact -->






























  @endsection
