@extends('layout.app')
@section('title','Library')
@section('main')
   <!-- Library head -->
    <div class="about-bg">
        <div class="container">
           <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                 <div class="abouttitle">
                    <h2>Libraries</h2>
                 </div>
              </div>
           </div>
        </div>
     </div>
   <!-- End Library head-->

   <!-- Library -->
     <div class="Library">
        <div class="container">
           <div class="row">
              <div class="col-md-10 offset-md-1">
                 <div class="titlepage">
                    <span>Our libraries give you the space to study alone or with your group. As well as physical and online materials and technology to do what you need to do.</span>
                 </div>
              </div>

            <!-- Library card-->
            <!--Matheson Library-->
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                 <div class="box-featured">
                    <a href="#" class="box-featured__thumb-link"><img src="{{asset('images/library/matheson.jpg')}}" alt="Sir Louis Matheson Library" class="box-featured__thumb-image"></a>
                    <div class="box-featured__blurb">
                       <h2 class="box-featured__heading">Matheson Library</h2>
                       <div class="box-featured__description">
                          <p>The new-generation humanities library, home to our special collections and exhibitions.</p>
                       </div>
                          <p><i>Location: 1A Memorial Building</i></p>
                    </div>
                 </div>
              </div>

            <!--peninsula Library-->
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                 <div class="box-featured">
                    <a href="#" class="box-featured__thumb-link"><img src="{{asset('images/library/peninsula.jpg')}}" alt="Peninsula Library" class="box-featured__thumb-image"></a>
                    <div class="box-featured__blurb">
                       <h2 class="box-featured__heading">Peninsula Library</h2>
                       <div class="box-featured__description">
                          <p>Business, health and education learning hub.</p><br>
                       </div>
                          <p><i>Location: 2A Memorial Building</i></p>
                    </div>
                 </div>
              </div>

            <!--Caufield Library-->
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 item">
                 <div class="box-featured">
                    <a href="#" class="box-featured__thumb-link"><img src="{{asset('images/library/caulfield.jpg')}}" alt="Caufield Library" class="box-featured__thumb-image"></a>
                    <div class="box-featured__blurb">
                       <h2 class="box-featured__heading">Caufield Library</h2>
                       <div class="box-featured__description">
                          <p>Extended hours for flexible study. More space, more technology and more inspiration at this campus hub.</p>
                       </div>
                          <p><i>Location: 3A Memorial Building</i></p>
                    </div>
                 </div>
              </div>

            <!--Hargrave Library-->
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 item">
                 <div class="box-featured">
                    <a href="#" class="box-featured__thumb-link"><img src="{{asset('images/library/hargrave.jpg')}}" alt="Hargrave Library" class="box-featured__thumb-image"></a>
                    <div class="box-featured__blurb">
                       <h2 class="box-featured__heading">Hargrave Library</h2>
                       <div class="box-featured__description">
                          <p>An inspiring modern space focusing on science, engineering, medicine and IT.</p><br>
                       </div>
                          <p><i>Location: 1B Memorial Building</i></p>
                    </div>
                 </div>
              </div>

            <!--Law Library-->
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 item">
                 <div class="box-featured">
                    <a href="#" class="box-featured__thumb-link"><img src="{{asset('images/library/law.jpg')}}" alt="Law Library" class="box-featured__thumb-image"></a>
                    <div class="box-featured__blurb">
                       <h2 class="box-featured__heading">Law Library</h2>
                       <div class="box-featured__description">
                          <p>Specialist resources for law students and researchers.</p><br>
                       </div>
                          <p><i>Location: 2B Memorial Building</i></p>
                    </div>
                 </div>
              </div>

            <!--Pharmacy Library-->
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 item">
                 <div class="box-featured">
                    <a href="#" class="box-featured__thumb-link"><img src="{{asset('images/library/pharma.jpg')}}" alt="Pharma Library" class="box-featured__thumb-image"></a>
                    <div class="box-featured__blurb">
                       <h2 class="box-featured__heading">Pharmacy Library</h2>
                       <div class="box-featured__description">
                          <p>Specialises in pharmacy and pharmaceutical sciences.</p><br>
                       </div>
                          <p><i>Location: 3B Memorial Building</i></p>
                    </div>
                 </div>
              </div>

            <!-------------------End Library body--------------------------------->
           </div>
        </div>
     </div>
   <!--End Library-->
@endsection
