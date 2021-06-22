
@extends('layout.profile')
@section('contentProfile')

@endsection
@section('contentMembership')

<h3>Become a member at Memorial library during our anniversary week and get 10% off the membership free! Get access to our ever -expanding collection of books, DVDs, online resources, event and activites.    </h3>

    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4 ">
            <div class="card border-0 ">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"> <img src="{{asset('uploads')}}/package.png" width="75%" alt="avatar">
                            <div class="card-body text-center ">
                                <h5 class="card-title mb-0">Package One</h5>
                                <div class="card-text text-black-50">3 Mounths</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Package One</h1>
                            <p class="description text-black-50">This is some description about the member of the team, which appears at the back of card and the image appears at the top of the front side with their social media links and the position of the member.</p> <a href="#" class="fa fa-facebook"></a> <a href="#" class="fa fa-twitter"></a> <a href="#" class="fa fa-linkedin"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4 ">
            <div class="card border-0 ">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front"> <img src="{{asset('uploads')}}/package.png" width="75%" alt="avatar">
                            <div class="card-body text-center ">
                                <h5 class="card-title mb-0">Package two</h5>
                                <div class="card-text text-black-50">6 Mounths</div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <h1 class="person text- ">Package two</h1>
                            <p class="description text-black-50">This is some description about the member of the team, which appears at the back of card and the image appears at the top of the front side with their social media links and the position of the member.</p> <a href="#" class="fa fa-facebook"></a> <a href="#" class="fa fa-twitter"></a> <a href="#" class="fa fa-linkedin"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4 ">
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
                            <h1 class="person text- ">Member One</h1>
                            <p class="description text-black-50">This is some description about the member of the team, which appears at the back of card and the image appears at the top of the front side with their social media links and the position of the member.</p> <a href="#" class="fa fa-facebook"></a> <a href="#" class="fa fa-twitter"></a> <a href="#" class="fa fa-linkedin"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection
@section('script')
    <script>
        var element = document.getElementById("changePass");
        element.classList.add("active");
    </script>
@endsection






