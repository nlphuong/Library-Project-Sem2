@extends('layout.app')
@section('title','index')
@section('body-class','home_page')
@section('main')
    @if(Session::has('loginSuccess'))
        <script>alert('{{Session::get("loginSuccess")}}')</script>
    @endif
     <!-- slide-show -->
     <section class="slider_section" >
            <div id="myCarousel" class="carousel slide banner-main" data-ride="carousel">
                <div class="carousel-inner">
                   <div class="carousel-item active">
                      <img class="first-slide" src="{{asset('images')}}/banner.jpg" alt="First slide">
                      <div class="container">
                         <div class="carousel-caption relative">
                            <h1>The Best Libraries That<br> Every Book Lover Must<br> Visit!</h1>
                            <p>We inspire and enable independent minds<br> providing resources, spaces and technologies.</p>
                            <ul class="locat_icon">
                               <li> <a href="#"><img src="{{asset('icon')}}/facebook.png"></a></li>
                               <li> <a href="#"><img src="{{asset('icon')}}/Twitter.png"></a></li>
                               <li> <a href="#"><img src="{{asset('icon')}}/linkedin.png"></a></li>
                               <li> <a href="#"><img src="{{asset('icon')}}/instagram.png"></a></li>
                            </ul>
                         </div>
                      </div>
                   </div>
                   <div class="carousel-item">
                      <img class="second-slide" src="{{asset('/images/Home')}}/b7.jpg" alt="Second slide">
                      <div class="container">
                         <div class="carousel-caption relative">
                             </div>
                            <ul class="locat_icon">
                               <li> <a href="#"><img src="{{asset('icon')}}/facebook.png"></a></li>
                               <li> <a href="#"><img src="{{asset('icon')}}/Twitter.png"></a></li>
                               <li> <a href="#"><img src="{{asset('icon')}}/linkedin.png"></a></li>
                               <li> <a href="#"><img src="{{asset('icon')}}/instagram.png"></a></li>
                            </ul>
                         </div>
                      </div>
                      <div class="carousel-item">
                        <img class="third-slide" src="{{asset('/images/Home')}}/b6.jpg" alt="Third slide">
                        <div class="container">
                           <div class="carousel-caption relative">
                               </div>
                              <ul class="locat_icon">
                                 <li> <a href="#"><img src="{{asset('icon')}}/facebook.png"></a></li>
                                 <li> <a href="#"><img src="{{asset('icon')}}/Twitter.png"></a></li>
                                 <li> <a href="#"><img src="{{asset('icon')}}/linkedin.png"></a></li>
                                 <li> <a href="#"><img src="{{asset('icon')}}/instagram.png"></a></li>
                              </ul>
                           </div>
                        </div>
                </div>
                <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
     </section>
     <!-- end slide-show -->
     <!-- about -->
     <div class="about">
        <div class="container">
           <div class="row">
              <div class="col-md-10 offset-md-1">
                <div class="aboutheading">
                <h2>About <strong class="black">Us</strong></h2>
                <span>We inspire and enable independent minds, providing resources, spaces and technologies.</span>
             </div>
              </div>
           </div>
           <div class="row border">
              <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
                 <div class="about-box">
                    <p>The library is an ideal place to enjoy the delight of perusing and for exploring. And let Memorial give you all you need. We inspire and enable independent minds, providing resources, spaces and technologies. A library, which may vary widely in size, may be organized for use and maintained by a public body such as a government, an institution/ schools, a corporation, or a private individual. In addition to providing materials, libraries also provide the services of librarians who are trained and experts at finding, selecting, circulating and organizing information and at interpreting information needs, navigating and analyzing very large amounts of information with a variety of resources. Hence, librarians go an extra mile to meet the user's need by ensuring that their users are satisfied with the information provided.[citation needed] A Librarian is one person who is expected to be very vibrant and innovative especially in this digital world.</p>
                    <a href="{{url('about')}}">Read More</a>
                 </div>
              </div>
              <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
                 <div class="about-box">
                    <figure><img style="width:100%" src="{{asset('/images/Home')}}/11.jfif" alt="img" /></figure>
                 </div>
              </div>
           </div>
        </div>
     </div>

     <!-- end about -->
     <!-- Library -->
     <div class="Library">
        <div class="container">
           <div class="row">
              <div class="col-md-10 offset-md-1">
                 <div class="titlepage">
                    <h2>Our <strong class="black">Library </strong></h2>
                    <span>Our libraries give you the space to study alone or with your group. As well as physical and online materials</span>
                 </div>
              </div>
           </div>
        </div>
        <div class="bg">
           <div class="container">
              <div class="row">
                 <div class="col-md-10 offset-md-1">
                    <div class="Library-box">
                       <figure><img src="{{asset('images')}}/Library-.jpg" alt="#"/></figure>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="container">
           <div class="row">
              <div class="col-md-12">
                 <div class="read-more">
                    <a href="{{url('library')}}">Read More</a>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end Library -->
     <!--Books -->
     <div class="Books">
        <div class="container">
           <div class="row">
              <div class="col-md-10 offset-md-1">
                 <div class="titlepage">
                    <h2>Our <strong class="black">Books </strong></h2>
                    <span>Books are both culturally relevant and age appropriate providing children with stories and themes they can readily understand and engage with</span>
                 </div>
              </div>
           </div>
           <div class="row box">
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                 <div class="book-box">
                    <figure><img src="{{asset('images')}}/book-1.jpg" alt="img"/></figure>
                 </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                 <div class="book-box">
                    <figure><img src="{{asset('images')}}/book-2.jpg" alt="img"/></figure>
                 </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                 <div class="book-box">
                    <figure><img src="{{asset('images')}}/book-1.jpg" alt="img"/></figure>
                 </div>
              </div>
              <div class="col-md-6 offset-md-3">
                <p>Our approach is whole of language learning, specifically created to meet the needs of children in destinations where history, poverty or remoteness limit the community’s ability to access quality reading material</p>
              </div>
           </div>
           <div class="container">
              <div class="row">
                 <div class="col-md-12">
                    <div class="read-more">
                       <a href="{{url('books')}}">Read More</a>
                    </div>
                 </div>
              </div>
           </div>
        </div>
     </div>
     <!-- end Books -->
     <!-- Contact -->
     @include('user.homePage.contactHome')
     <!-- end Contact -->
@endsection
