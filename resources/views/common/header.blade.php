
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
                                 <li> <a href="{{url('home')}}">Home</a> </li>
                                 <li> <a href="{{url('about')}}">About us</a> </li>
                                 <li><a href="{{url('books')}}">Our Books</a></li>
                                 <li><a href="{{url('library')}}">library</a></li>
                                 <li><a href="{{url('contact')}}">Contact us</a></li>
                                 <li> <a href="#"><img src="{{asset('images/search_icon.png')}}" alt="#" /></a> </li>

                                 <li>
                                    <a href="#"  onclick="document.getElementById('id01').style.display='block'" style="width:auto;"><img src="{{asset('images/top-icon.png')}}" alt="Login" title="Login" /></a>

                                    <div id="id01" class="modal">

                                      <form class="modal-content animate" action="/action_page.php" method="post">
                                        <div class="imgcontainer">
                                          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Login">&times;</span>
                                          <img src="{{asset('images/avata-login.jpg')}}" alt="Avatar" class="avatar">
                                        </div>
                                        <br>
                                        <div class="container">
                                            <div class="form-group ">
                                                <input type="text" class="form-control border-primary " placeholder="Enter Username" name="uname" required>
                                                <br>

                                                <input type="password" class="form-control border-primary " placeholder="Enter Password" name="psw" required>
                                                <br>
                                                <button type="submit" class="btn btn-primary ">Login</button>
                                                <label style="padding-left: 10px">
                                                  <input type="checkbox" checked="checked" name="remember"> Remember me
                                                </label>
                                            </div>

                                        </div>

                                        <div class="container" style="background-color:#f1f1f1">
                                            <span class="psw"><a href="{{url('register')}}">Register now</a></span>
                                            <span class="psw"><a href="#">Forgot password?</a></span>
                                        </div>
                                      </form>
                                    </div>
                                 </li>

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
