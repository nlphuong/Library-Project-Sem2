<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>@yield('title')</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

      <!-- style css -->
      <link rel="stylesheet" href="{{asset('css/style.css')}}">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
      <!-- fevicon -->
      <link rel="icon" href="{{asset('images/fevicon.png')}}" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{asset('css/jquery.mCustomScrollbar.min.css')}}">
      <!-- Tweaks for older IEs-->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="@yield('body-class')">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="{{asset('images/loading.gif')}}" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="{{url('/')}}"><img src="{{asset('images')}}/logo.png" alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li> <a href="{{url('/')}}">Home</a> </li>
                                 <li> <a href="{{url('about')}}">About us</a> </li>
                                 <li><a href="{{url('books')}}">Our Books</a></li>
                                 <li><a href="{{url('library')}}">library</a></li>
                                 <li><a href="{{url('contact')}}">Contact us</a></li>
                                 <li> <a href="#"><img src="{{asset('images/search_icon.png')}}" alt="#" /></a> </li>


                                    @if(session('accountSession'))
                                    <li>
                                        <a href="#" class="drop-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">hi {{session('accountSession')[0]['fullname']}}<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="#" class="dropdown-item drop-content" >Profile</a>
                                            <a href="{{url('/logout')}}" class="dropdown-item drop-content" >Logout</a>

                                          </div>

                                    </li>
                                    @endif
                                    @if(session('adminSession'))
                                        <li><a href="{{url('admin/index')}}"><img src="{{asset('images')}}/admin.png" width="30px" alt=""></a></li>

                                    @endif



                                 <li></li>
                                </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <!-- end header inner -->
      </header>

      @yield('main')
      <footer>
        <div class="footer">
           <div class="container">
              <div class="row pdn-top-30">
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                    <div class="Follow">
                       <h3>Follow Us</h3>
                    </div>
                    <ul class="location_icon">
                       <li> <a href="#"><img src="{{asset('icon')}}/facebook.png"></a></li>
                       <li> <a href="#"><img src="{{asset('icon')}}/Twitter.png"></a></li>
                       <li> <a href="#"><img src="{{asset('icon')}}/linkedin.png"></a></li>
                       <li> <a href="#"><img src="{{asset('icon')}}/instagram.png"></a></li>
                    </ul>
                 </div>
                 <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                    <div class="Follow">
                       <h3>Newsletter</h3>
                    </div>
                    <input class="Newsletter" placeholder="Enter your email" type="Enter your email">
                    <button class="Subscribe">Subscribe</button>
                 </div>
              </div>
           </div>
        </div>
        <div class="copyright">
           <div class="container">
              <p>Copyright 2019 All Right Reserved By <a href="https://html.design/">Free html Templates</a></p>
           </div>
        </div>
     </footer>
     <!-- end footer -->
     <!-- Javascript files-->
     @if(Session::has('login'))
        <script>
            document.getElementById('id01').style.display="block";
        </script>
     @endif
     <script src="{{asset('js/jquery.min.js')}}"></script>
     <script src="{{asset('js/popper.min.js')}}"></script>
     <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
     <script src="{{asset('js/jquery-3.0.0.min.js')}}"></script>
     <script src="{{asset('js/plugin.js')}}"></script>
     <!-- sidebar -->
     <script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
     <script src="{{asset('js/custom.js')}}"></script>

  </body>
</html>
