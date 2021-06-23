
@extends('layout.profile')
@section('contentProfile')
<div class="card-header">
    <div class="row">
      <div class="col-sm-1">
          <i class="fa fa-key"></i>
      </div>
      <div class="col-sm-11">
        <p> Change Password</p>
        <p>You should use a strong password that you have not used anywhere else</p>
      </div>
    </div>


</div>

<div class="card-body">
        @if(Session::has('fail'))
          <div class="alert alert-danger" role="alert">
              {{Session::get('fail')}}
          </div>
        @endif
  <form method="post" action="{{url('customer/changePass/'.$account->id)}}">
      @csrf


      <div class="form-group">
          <label for="my-input">Current Password</label>
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
      <div class="form-group">
          <label for="my-input">New Password</label>
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
      <div class="form-group">
          <label for="my-input">Confirm Password</label>
          <input id="my-input" class="form-control"  required type="password" name="confirmPass">
          @error('confirmPass')
            <div class="alert alert-danger" role="alert">
                {{$message}}
            </div>
          @enderror
      </div>

      <button type="submit" class="btn btn-primary" onclick="confirm('Are you sure change password?')">Save Change</button>
  </form>


</div>
@endsection
@section('script')
    <script>
        var element = document.getElementById("changePass");
        element.classList.add("active");
    </script>
@endsection






