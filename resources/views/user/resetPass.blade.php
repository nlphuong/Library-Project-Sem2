@extends('layout.app')
@section('title','Reset Password')
@section('main')
{{-- notifi success change password --}}
<link rel="stylesheet" href="{{asset('css')}}/admincss.css">
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center; border-radius: 25px;">
            <div class="modal-body">
                <div class="success-checkmark">
                    <div class="check-icon" style="box-sizing: content-box !important">
                        <span class="icon-line line-tip"></span>
                        <span class="icon-line line-long"></span>
                        <div class="icon-circle"></div>
                        <div class="icon-fix"></div>
                    </div>
                </div>
                <p>
                    @if(Session::get('Success'))
                    <span style="font-size: 20px;">{{Session::get('Success')}}</span>
                    @endif
                    @if(Session::get('fail'))
                    <span style="font-size: 20px;">{{Session::get('fail')}}</span>
                    @endif

                </p>
            </div>
        </div>
    </div>
</div>
<div class="about-bg">
    <div class="container">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
          <div class="abouttitle">
            <h2>Reset Password</h2>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container">
    <div class="card card-primary" style="margin: 100px 0px">
      <div class="card-header">
        <h3 class="card-title">Please enter your email to search for your account.</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form action="" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="card-body">
            <div class="row">
              <div class="col-md-10 offset-md-1">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required name="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <div class="alert alert-danger" role="alert">
                        {{$message}}
                    </div>
                    @enderror
              </div>
            </div>

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-md-10 offset-md-1">
              <button type="submit" class="btn btn-violet">Submit</button>
            </div>
        </div>
      </form>
    </div>
</div>


@endsection
@section('script')
    @if(Session::has('Success') )
    <script>
        $(document).ready(function () {
            $('#modal-id').modal('show');
        });

    </script>
    @endif
@endsection
