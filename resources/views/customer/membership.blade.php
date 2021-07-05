
@extends('layout.profile')
@section('contentProfile')
<link rel="stylesheet" href="{{asset('css')}}/admincss.css">
@endsection
@section('contentMembership')
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
@if($membership==null)
<h3>Become a member at Memorial library during our anniversary week and get 10% off the membership free! Get access to our ever -expanding collection of books event and activites.    </h3>
 @endif
    @if($membership==null)
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4 " style="height: 300px !important">
            <div class="card border-0 ">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"> <img src="{{asset('uploads')}}/package.png" width="75%" alt="avatar">
                            <div class="card-body text-center ">
                                <h5 class="card-title mb-0">Package One</h5>
                                <div class="card-text text-black-50">1 Mounths</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Package One</h1>
                            <p class="description text-black-50">This is some description about the member of the team, which appears at the back of card and the image appears at the top of the front side with their social media links and the position of the member.</p>
                            <p>9$/1 Month</p>
                            <a onclick="confirm('Are you sure you want to register this membership Package!')" href="{{url('customer/RegisPack/'.$account->id).'?pack=1'}}" class="btn btn-success">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4 " style="height: 300px !important">
            <div class="card border-0 ">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"> <img src="{{asset('uploads')}}/package.png" width="75%" alt="avatar">
                            <div class="card-body text-center ">
                                <h5 class="card-title mb-0">Package two</h5>
                                <div class="card-text text-black-50">3 Mounths</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Package two</h1>
                            <p class="description text-black-50">This is some description about the member of the team, which appears at the back of card and the image appears at the top of the front side with their social media links and the position of the member.</p>
                            <p>25$/3 Months</p>
                            <a onclick="confirm('Are you sure you want to register this membership Package!')" href="{{url('customer/RegisPack/'.$account->id).'?pack=2'}}" class="btn btn-success">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4 " style="height: 300px !important">
            <div class="card border-0 ">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"> <img src="{{asset('uploads')}}/package.png" width="75%" alt="avatar">
                            <div class="card-body text-center ">
                                <h5 class="card-title mb-0">Package three</h5>
                                <div class="card-text text-black-50">One Years</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Package three</h1>
                            <p class="description text-black-50">This is some description about the member of the team, which appears at the back of card and the image appears at the top of the front side with their social media links and the position of the member.</p>
                            <p>89$/1 Year</p>
                            <a onclick="confirm('Are you sure you want to register this membership Package!')" href="{{url('customer/RegisPack/'.$account->id).'?pack=3'}}" class="btn btn-success">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @else
    <div class="col-12">
        <div class="p-3 py-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex flex-row align-items-center back"><i class="fa fa-user mr-1 mb-1"></i>
                    <h6 style="font-size: 20px">Library Member</h6>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    Name: {{$account->fullname}}
                </div>
                <div class="col-md-6">
                    Phone number:{{$account->phone}}
                </div>
                <div class="col-md-6">
                    Email: {{$account->email}}
                </div>
                <div class="col-md-6">
                    Membership ID: {{$membership->id}}
                </div>
            </div>
            <br>
            <!--Membership package-->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex flex-row align-items-center back"><i class="fa fa-vcard-o mr-1 mb-1"></i>
                    <h6 style="font-size: 20px">Membership Package</h6>
                </div>
            </div>

            <div class="card">
                <div class="row mt-3">
                    @if($membership->status==1)
                    <div class="col-sm-12">
                        <div class="alert alert-primary" role="alert">
                            Please go to the library to pay!
                        </div>
                    </div>
                    @endif
                    <div class="col-sm-6">
                        <div class="borrow-image">
                            <img src="{{asset('images/membershipCard.jpg')}}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            @if($membership->status==1)
                            <p class="card-text">
                                <i class="fa fa-hourglass-start booktime"></i> Start Date:
                             <br>
                                <i class="fa fa-hourglass-end booktime"></i> Expiration Date:
                             <br>
                                <img src="{{asset('images/unpaid.jpg')}}" alt="" width="100%">
                            </p>
                            @else
                            <p class="card-text">
                            <i class="fa fa-hourglass-start booktime"></i> Start Date: {{$membership->start_date}}
                             <br>
                            <i class="fa fa-hourglass-end booktime"></i> Expiration Date: {{$membership->expiration_Date}}
                            <br>
                            <img src="{{asset('images/paid.jpg')}}" alt="" width="100%">
                            </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <br>



        </div>
    </div>
    @endif



@endsection
@section('script')
    <script>
        var element = document.getElementById("membership");
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






