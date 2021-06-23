@extends('layout.admin.index')
@section('main')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
@endsection

    {{-- notifi success change password --}}

    <div class="modal fade" id="modal-id">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 style="font-weight: bold" class="modal-title">Message</h3>
                </div>
                <div class="modal-body">
                    <div class="success-checkmark">
                        <div class="check-icon" style="box-sizing: content-box !important">
                          <span class="icon-line line-tip"></span>
                          <span class="icon-line line-long"></span>
                          <div class="icon-circle"></div>
                          <div class="icon-fix" ></div>
                        </div>
                    </div>

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>

                            {{Session::get('success')}}

                        </strong>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile
      </h1>
      {{-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">User profile</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads')}}/{{session('adminSession')[0]['image']}}" alt="User profile picture">

              <h3 class="profile-username text-center">{{session('adminSession')[0]['fullname']}}</h3>

              <p class="text-muted text-center">Admin</p>

              <strong><i class="fa fa-envelope-open margin-r-5"></i> Mail</strong>

              <p class="text-muted">
                {{session('adminSession')[0]['email']}}
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">{{session('adminSession')[0]['address']}}</p>

              <hr>
              <strong><i class="fa fa-user-circle margin-r-5"></i> Date of birth</strong>

              <p class="text-muted">{{session('adminSession')[0]['birthday']}}</p>

              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>

              <p class="text-muted">{{session('adminSession')[0]['phone']}}</p>

              <hr>



            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              {{-- <li class="active" id="t1"><a href="#activity" data-toggle="tab">Activity</a></li> --}}

              <li class="active"><a href="#settings" data-toggle="tab">Account Settings</a></li>
            </ul>
            <div class="tab-content">
              {{-- <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

              </div> --}}


              <div class="active tab-pane" id="settings">
                  <div class="content-header">
                      <h3>Change information</h3>
                  </div>
                  <div class="content">
                    <div class="box ">

                        <form method="POST" style="padding: 15px 5px" class="form-horizontal" action="{{url('admin/editProfile/'.session('adminSession')[0]['id'])}}">
                            @csrf
                          <div class="form-group">
                            <label for="inputName" class="col-sm-2 control-label">Full Name</label>

                            <div class="col-sm-10">
                              <input type="text" required class="form-control" name="fullname" id="inputName" value="{{session('adminSession')[0]['fullname']}}">
                              @error('fullname')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                              @enderror
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" required class="form-control" id="inputEmail" name="email" value="{{session('adminSession')[0]['email']}}">
                              @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label  class="col-sm-2 control-label">Gender</label>

                            <div class="col-sm-10">
                              <input type="radio"  name="gender" @if(session('adminSession')[0]['gender']==1) checked @endif value="1"> Male
                              <input type="radio"  name="gender" @if(session('adminSession')[0]['gender']==2) checked @endif value="2"> Female
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="birthday" class="col-sm-2 control-label">Date Of Birth</label>
                            <div class="col-sm-10">
                              <input type="date" class="form-control" required id="birthday" name="birthday" value="{{session('adminSession')[0]['birthday']}}">
                              @error('birthday')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="address" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" required id="address" name="address" value="{{session('adminSession')[0]['address']}}">
                              @error('address')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                              <input type="number" required class="form-control" id="phone" name="phone" value="{{session('adminSession')[0]['phone']}}">
                              @error('phone')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                              @enderror
                            </div>
                          </div>


                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary" onclick="confirm('Are you sure change information?')">Save Change</button>
                            </div>
                          </div>
                        </form>
                    </div>

                  </div>
                  <div class="content-header">
                    <div class="box box-primary">
                        <div class="row">
                            <div class="col-sm-1">
                                <i class="fa fa-key" style="font-size: 35px;position: relative; top: 20px;left:10px"></i>
                            </div>
                            <div class="col-sm-11">
                              <h3> Change Password</h3>
                              <p>You should use a strong password that you have not used anywhere else</p>
                            </div>
                          </div>
                    </div>
                  </div>
                  <div class="content">
                    <form method="post" class="form-horizontal" action="{{url('admin/changePass/'.session('adminSession')[0]['id'])}}">
                        @csrf


                        <div class="form-group">

                            <label class="col-sm-2 control-label" for="my-input">Current Password</label>
                            <div class="col-sm-10">
                                <input id="my-input" class="form-control" required  type="password" name="currentPass">
                                @error('currentPass')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}
                                    </div>
                                 @enderror
                                 @if(Session::has('incorrect'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('incorrect')}}
                                </div>
                                 @endif
                            </div>


                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="my-input">New Password</label>
                            <div class="col-sm-10">
                                <input id="my-input" class="form-control" required  type="password" name="password">
                                @error('password')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                                @if(Session::has('same'))
                                <div class="alert alert-danger" role="alert">
                                    {{Session::get('same')}}
                                </div>
                                @endif
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="my-input" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                                <input id="my-input" class="form-control"  required type="password" name="confirmPass">
                                @error('confirmPass')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" onclick="confirm('Are you sure change password?')">Save Change</button>
                            </div>
                          </div>

                    </form>
                  </div>

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

    @if(Session::has('success') )
    <script>
        $(document).ready(function () {
            $('#modal-id').modal('show');
        });
    </script>
    @endif
@endsection
