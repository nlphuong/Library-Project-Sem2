@extends('layout.profile')
@section('contentProfile')
    <!-- Membership detail -->
    <div class="container rounded bg-white">
        <div class="row">
            
            <div class="col-12">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-user mr-1 mb-1"></i>
                            <h6 style="font-size: 20px">Library Member</h6>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            Name: 
                        </div>
                        <div class="col-md-6">
                            Phone number:
                        </div>
                        <div class="col-md-6">
                            Email:
                        </div>
                        <div class="col-md-6">
                            Membership ID: 
                        </div>
                    </div>
                    <br>
        <!--Borrowing book-->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-row align-items-center back"><i class="fa fa-book mr-1 mb-1"></i>
                            <h6 style="font-size: 20px">Borrowing Book</h6>
                        </div>
                    </div>

                    <!--Book 1-->
                    <div class="card">
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="borrow-image">
                                    <img src="{{asset('images/book-1.jpg')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <h4 class="card-title">One Hundred Years of Solitude (P.S.) (Modern Classics)</h4>
                                    <p class="card-text">
                                    <i class="fa fa-hourglass-start booktime"></i> Borrow Date:
                                 <br>
                                    <i class="fa fa-hourglass-end booktime"></i> Return Date:
                                 <br>
                                    <i class="fa fa-clock-o booktime"></i> Time left:
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <br>
                    <!--Book 2-->
                    <div class="card">
                        <div class="row mt-3">
                            <div class="col-sm-6">
                                <div class="borrow-image">
                                    <img src="{{asset('images/book-2.jpg')}}">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card-body">
                                    <h4 class="card-title">To Kill a Mockingbird</h4>
                                    <p class="card-text">
                                    <i class="fa fa-hourglass-start booktime"></i> Borrow Date:
                                 <br>
                                    <i class="fa fa-hourglass-end booktime"></i> Return Date:
                                 <br>
                                    <i class="fa fa-clock-o booktime"></i> Time left:
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var element = document.getElementById("bookmanager");
        element.classList.add("active");
    </script>
@endsection