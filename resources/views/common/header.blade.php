
<!-- header -->
<header>
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo"> <a href="{{url('home')}}"><img src="{{asset('images/logo.png')}}" alt="#"></a> </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li> <a href="{{url('customer/index')}}">Home</a> </li>
                                 <li> <a href="{{url('about')}}">About us</a> </li>
                                 <li><a href="{{url('books')}}">Our Books</a></li>
                                 <li><a href="{{url('library')}}">library</a></li>
                                 <li><a href="{{url('contact')}}">Contact us</a></li>
                                 <li> <a href="#"><img src="{{asset('images/search_icon.png')}}" alt="#" /></a> </li>
                                 @if(session('accountSession'))
                                    <li>
                                        <a href="#" class="drop-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">hi {{session('accountSession')[0]['fullname']}}<i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" style="width: 34%">
                                            <div class="text-center"><img width="20%" style="border-radius: 50%;"  src="{{asset('uploads')}}/{{session('accountSession')[0]['image']}}" alt="">
                                                     <span style="padding-left: 5px">{{session('accountSession')[0]['email']}}</span>
                                            </div>
                                            <a href="{{url('/customer/profile')}}/{{session('accountSession')[0]['id']}}" class="dropdown-item drop-content" >Your Profile</a>
                                            <a href="{{url('/logout')}}" class="dropdown-item drop-content" >Sign out</a>

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
