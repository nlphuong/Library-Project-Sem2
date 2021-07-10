
@extends('layout.profile')
@section('contentProfile')
<link rel="stylesheet" href="{{asset('css')}}/admincss.css">
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

    <div class="card-body">
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          {{$account->fullname}}
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Birthday</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          {{date('d-m-Y', strtotime($account->birthday))}}

        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Gender</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          @if($account->gender==1) male
          @else femail
          @endif
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          {{$account->email}}
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Phone</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          {{$account->phone}}
        </div>
      </div>
      <hr>

      <div class="row">
        <div class="col-sm-3">
          <h6 class="mb-0">Address</h6>
        </div>
        <div class="col-sm-9 text-secondary">
          {{$account->address}}
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-sm-12">

          <button class="btn btn-dark" type="button" data-toggle="modal" data-target="#my-modal"><i class="fa fa-edit"></i></button>
          <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h3 class="" id="my-modal-title">Edit profile</h3>
                          <button class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <form method="post" action="{{url('customer/editProfile/'.$account->id)}}">
                              @csrf
                              <div class="form-group">
                                  <label for="my-input">Fullname</label>
                                  <input id="my-input" class="form-control" type="text" name="fullname" value="{{$account->fullname}}">
                              </div>
                              @error('fullname')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                              @enderror
                              <div class="form-group">
                                  <label for="my-input">Email</label>
                                  <input id="my-input" class="form-control" type="email" name="email" value="{{$account->email}}">
                              </div>
                              @error('email')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                              @enderror
                              <div class="form-group">
                                  <label for="gender">Gender</label><br>
                                  <input type="radio" name="gender" value="1" @if($account->gender==1) checked @endif>  Male
                                  <input type="radio" name="gender" value="2"  @if($account->gender==2) checked @endif >  Female
                              </div>
                              <div class="form-group">
                                  <label for="address">Address</label>
                                  <input type="text" class="form-control" id="address"  required name="address" value="{{$account->address}}">
                                  @error('address')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                              @enderror
                                </div>
                                <div class="form-group">
                                  <label for="birthday">Birthday</label>
                                  <input type="date" class="form-control" id="birthday" name="birthday" required value="{{$account->birthday}}">
                                  @error('birthday')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                              @enderror
                                </div>
                                <div class="form-group">
                                  <label for="phone">Phone Number</label>
                                  <input type="text" pattern="[03][0-9]{9}" class="form-control" id="phone"  required name="phone" value="{{$account->phone}}">
                                  @error('phone')
                                  <div class="alert alert-danger" role="alert">
                                      {{$message}}
                                  </div>
                              @enderror
                                </div>
                                <button type="submit" class="btn btn-primary" onclick="confirm('Are you sure you want to update ?')">Update</button>
                          </form>
                      </div>

                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>

@endsection
@section('script')

    @if($errors->any())
        <script>
                $('#my-modal').modal('show');
        </script>
    @endif
    <script>
        var element = document.getElementById("overview");
        element.classList.add("active");

    </script>
    @if(Session::has('success') )
    <script>
        $(document).ready(function () {
            $('#modal-id').modal('show');
        });

    </script>
    @endif
@endsection

