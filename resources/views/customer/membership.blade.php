
@extends('layout.profile')
@section('contentProfile')

@endsection
@section('contentMembership')

<h3>Become a member at Memorial library during our anniversary week and get 10% off the membership free! Get access to our ever -expanding collection of books, DVDs, online resources, event and activites.    </h3>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4 " style="height: 300px !important">
            <div class="card border-0 ">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"> <img src="{{asset('uploads')}}/package.png" width="75%" alt="avatar">
                            <div class="card-body text-center ">
                                <h5 class="card-title mb-0">Associate Member</h5>
                                <div class="card-text text-black-50">1 Month</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Associate Member</h1>
                            <p class="description text-black-50">We have a range of memberships on offer, suitable for all organisations and sectors. Take a look at the benefits under each package, then go to register 1 month to have a best experience.</p>
                            <a href="" class="btn btn-success">Register</a>
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
                                <h5 class="card-title mb-0">Standard Member</h5>
                                <div class="card-text text-black-50">6 Months</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Standard Member</h1>
                            <p class="description text-black-50">Here you will find all the information you need about your benefits. If you are not a member yet, we would be delighted to welcome you as a Member for 6 months.</p>
                            <a href="" class="btn btn-success">Register</a>
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
                                <h5 class="card-title mb-0">Advanced Member</h5>
                                <div class="card-text text-black-50">One Years</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Advanced Member</h1>
                            <p class="description text-black-50">We support you throughout your professional life. Whether you are a student, teacher or professor, there’s a membership package to match every career stage and meet your professional needs.</p>
                            <a href="" class="btn btn-success">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection
@section('script')
    <script>
        var element = document.getElementById("membership");
        element.classList.add("active");
    </script>
@endsection






