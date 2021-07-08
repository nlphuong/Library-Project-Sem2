@extends('layout.app')
@section('title','About')
@section('main')
<!-- about head -->
   <div class="about-bg">
      <div class="container">
         <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
               <div class="abouttitle">
                  <h2>About Us</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
<!-- End about head-->

<!-- about body -->
<div class="about">
   <div class="container py-5">
      <div class="row align-items-center mb-5">
         <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-dark"></i>
            <h2 class="font-weight-light">Reasearch and learning environments</h2>
            <p class="font-italic text-muted mb-4">The library is an ideal place to enjoy the delight of perusing and for exploring. And let Memorial give you all you need.</p>
            <p class="fotn-italic text-capitalize text-dark mb-4" style="font-size:x-large"><b>Memorial</b> - Where knowledge begins</p>
            <p class="fotn-italic text-capitalize mb-4" style="color: black; font-size: x-large">Always visit us whenever in <b>DOUBT</b></p>

         </div>
         <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{asset('images/research.jpg')}}" alt="research space" class="img-fluid mb-4 mb-lg-0"></div>
      </div>
    <br>
      <div class="row align-items-center">
         <div class="col-lg-5 px-5 mx-auto"><img src="{{asset('images/scholar.jpg')}}" alt="School document" class="img-fluid mb-4 mb-lg-0"></div>
            <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-dark"></i>
               <h2 class="font-weight-light">Memorial information</h2>
               <p class="font-weight-normal text-muted">We inspire and enable independent minds, providing resources, spaces and technologies.</p>
               <p class="font-weight-normal text-muted">Memorial library located at 9878/25 sec 9 rohini 35, in the middle of New York city</p>
               <p class="font-weight-normal text-muted">And for more information you can contact us through our phone number +91-9999878398</p>
               <p class="font-italic text-muted">Hope to see you soon. That would be an honer</p>
            </div>
      </div>
   </div>
</div>
<!-- End about body -->

<!--Team-->
   <div class="bg-light py-5">
      <div class="container py-5">
         <div class="row mb-4">
            <div class="col-lg-5">
               <h2 class="display-4 font-weight-light">Our team</h2>
               <p class="font-italic text-muted">Best working. Best product. Best success</p>
            </div>
         </div>

         <div class="row text-center">
            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
               <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('images/team/phuong.jpg')}}" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                  <h5 class="mb-0">Phương đại ca</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
                     <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com" target="blank" class="social-link"><i class="fa fa-facebook-f" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-twitter" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-instagram" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.linkedin.com/in/phuong-nguyen-0440bb210/" target="blank" class="social-link"><i class="fa fa-linkedin" style="font-size: 1em"></i></a></li>
                     </ul>
               </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
               <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('images/team/sang.jpg')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                  <h5 class="mb-0">Sang đẹp trai</h5><span class="small text-uppercase text-muted">COO - CoFounder</span>
                     <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com" target="blank" class="social-link"><i class="fa fa-facebook-f" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-twitter" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-instagram" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-linkedin" style="font-size: 1em"></i></a></li>
                     </ul>
               </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
               <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('images/team/tien.jpg')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                  <h5 class="mb-0">Tiên đẹp gái</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
                     <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com" target="blank" class="social-link"><i class="fa fa-facebook-f" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-twitter" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-instagram" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-linkedin" style="font-size: 1em"></i></a></li>
                     </ul>
               </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5">
               <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('images/team/hieu.jpg')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                  <h5 class="mb-0">Henry</h5><span class="small text-uppercase text-muted">Nhân viên góp vốn</span>
                     <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item"><a href="https://www.facebook.com" target="blank" class="social-link"><i class="fa fa-facebook-f" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-twitter" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-instagram" style="font-size: 1em"></i></a></li>
                        <li class="list-inline-item"><a href="#" target="blank" class="social-link"><i class="fa fa-linkedin" style="font-size: 1em"></i></a></li>
                     </ul>
               </div>
            </div>
            <!-- End-->
         </div>
      </div>
   </div>
<!--End team-->
<!-- end about -->
@endsection
