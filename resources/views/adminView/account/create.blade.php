
@extends('layout.admin.index')
@section('css')
  <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('main')
@if(Session::has('Success'))
<script>
    $(document).ready(function () {
        $('#modal-id').modal('show');
    });
</script>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            CREATE ACCOUNT
          <small></small>
        </h1>
         <ol class="breadcrumb">
          <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li><a >Account</a></li>
          <li class="active">Create new account</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="box box-primary">
            <div class="box-header with-border col-sm-offset-2">
              <h3 class="box-title">Please enter the following information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="POST">
                @csrf
              <div class="box-body col-sm-offset-2 col-sm-8">

                  <div class="form-group">
                    <label for="exampleInputName">Full Name</label>
                    <div class="input-group">

                        <div class="input-group-addon">
                            @
                        </div>
                        <input type="text" class="form-control" id="exampleInputName" placeholder="Enter Your Name" required name="fullname" value="{{old('fullname')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required name="email" value="{{old('email')}}">
                    </div>
                  </div>
                  @error('email')
                  <div class="alert alert-danger" role="alert">
                      {{$message}}
                  </div>
                  @enderror
                  <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <input type="password" pattern=".{8,}" class="form-control" id="password" placeholder="Password" required name="password">
                    </div>
                  </div>
                  @error('password')
                  <div class="alert alert-danger" role="alert">
                      {{$message}}
                  </div>
                  @enderror
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-lock"></i>
                        </div>
                        <input type="password" pattern=".{8,}" class="form-control" id="confirm_password" placeholder="Confirm Password" required name="confirm_password">
                    </div>
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
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-address-card-o"></i>
                        </div>
                        <input type="text" class="form-control" id="address" placeholder="Address" required name="address" value="{{old('address')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="date" class="form-control" id="birthday" name="birthday" required value="{{old('birthday')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                        </div>
                        <input type="text" pattern="[03][0-9]{9}" class="form-control" id="phone" placeholder="Phone"  required name="phone" value="{{old('phone')}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="phone">Role</label>
                    <select name="role" id="input" class="" required="required">
                        <option value="1" selected>Customer</option>
                        @if(session('adminSession')[0]['role']==3)
                        <option value="2">Admin</option>
                        <option value="3">Super Admin</option>
                        @endif
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary">Create</button>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
              </div>
            </form>
        </div>

    </section>
    <!-- /.content -->
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
                        </div>s
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
@endsection
@section('js')
    <!-- Summernote -->
<script src="{{asset('admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>


    $(document).ready( function () {
         $('#table_id').DataTable({
            "order": [[ 5, "desc" ]]
         }

         );
    } );
</script>

@endsection
