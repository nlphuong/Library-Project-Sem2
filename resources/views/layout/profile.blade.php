
@extends('layout.app')

@section('title','profile')
@section('body-class','contact-page')
@section('main')



<div class="about-bg"></div>
<div class="container">
    <div class="row profile" style="padding: 50px 0px">
		<div class="col-md-3">
			<div class="profile-sidebar">
				<!-- SIDEBAR USERPIC -->
				<div class="profile-userpic text-center">
					<img src="{{asset('uploads')}}/{{$account->image}}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{session('accountSession')[0]['fullname']}}
					</div>
					<div class="profile-usertitle-job">
						Customer since {{date('d-m-Y', strtotime($account->create_at))}}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
                    <form id="formA" method="POST" action="{{url('customer/changeAvatar/'.$account->id)}}" enctype="multipart/form-data" >
                        @csrf
                        <label for="my-input1"><span  class="btn btn-outline-secondary btn-sm">Change avatar</span></label>
                        <input id="my-input1" class="form-control" type="file" hidden name="upload" onchange="document.getElementById('formA').submit()">

					    {{-- <button type="button" class="btn btn-danger btn-sm">Change avatar</button> --}}
                    </form>

				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="">
						<li id="overview">
							<a href="{{url('customer/profile/'.$account->id)}}">
							<i class="fa fa-home"></i>
							Overview </a>
						</li>
						<li id="membership">
							<a href="{{url('customer/memberPack/'.$account->id)}}">
							<i class="fa fa-user"></i>
							Membership Package </a>
						</li>
						<li id="changePass">
							<a href="{{url('customer/changePass/'.$account->id)}}">
							<i class="fa fa-lock"></i>
							Change Password </a>
						</li>
						<li id="bookManage">
							<a href="{{url('customer/bookmanager/'.$account->id)}}">
							<i class="fa fa-book"></i>
							Books Manager </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>
		<div class="col-md-9">
            <div class="profile-content">
                    <div class="card mb-3">
                        @yield('contentProfile')
                    </div>
                    @yield('contentMembership')
            </div>
		</div>
	</div>
</div>
{{-- @yield('script') --}}
@section('js')
    <script>
        // $('#my-input1').change(function (e) {
        //     $('#formA').submit();

        // });

    </script>
@endsection
@endsection

