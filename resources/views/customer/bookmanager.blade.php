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
                <!--Borrowing book-->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="d-flex flex-row align-items-center back"><i class="fa fa-book mr-1 mb-1"></i>
                        <h6 style="font-size: 20px">@if($status == 1) Waiting
                                                    @elseif($status == 2) Borrowing
                                                    @elseif($status == 3) Paid
                                                    @elseif($status == 4) Expired
                                                    @endif</h6>
                        <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle text-success" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-style: none; background-color: white;">
                        </a>
                        <div class="dropdown-menu text-success" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item text-success" href="{{url('customer/bookmanager/'.$account->id.'/1')}}">Waiting</a>
                            <a class="dropdown-item text-success" href="{{url('customer/bookmanager/'.$account->id.'/2')}}">Borrowing</a>
                            <a class="dropdown-item text-success" href="{{url('customer/bookmanager/'.$account->id.'/3')}}">Paid</a>
                            <a class="dropdown-item text-success" href="{{url('customer/bookmanager/'.$account->id.'/4')}}">Expired</a>
                        </div>
                    </div>
                    </div>
                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle text-success" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border-style: none; background-color: white;">

                        </button>
                        <div class="dropdown-menu text-success" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item text-success" href="#">Waiting</a>
                            <a class="dropdown-item text-success" href="#">Borrowing</a>
                            <a class="dropdown-item text-success" href="#">Paid</a>
                            <a class="dropdown-item text-success" href="#">Expired</a>
                        </div>
                    </div> -->

                </div>

                <!--Book 1-->
                @foreach($borrow as $b)
                <div class="card">
                    <div class="row">
                        <div class="col-sm-6" style="display:flex; align-items: center;">
                            <img style="width: 60%; height: 250px;" src="{{asset('uploads')}}/{{$b->book->image}}">
                        </div>
                        <div class="col-sm-6">
                            <div class="card-body">
                                <h4 class="card-title">{{$b->book->title}}</h4>
                                <p class="card-text">
                                    <i class="fa fa-hourglass-start booktime"></i> Borrow Date: {{$b->borrowed_From}}
                                    <br>
                                    <i class="fa fa-hourglass-end booktime"></i> Expire Date: {{$b->expiration_Date == null ? 'Not yet' : $b->expiration_Date}}
                                    <br>
                                    <i class="fa fa-hourglass-end booktime"></i> Return Date: {{$b->return_Date == null ? 'Not yet' : $b->return_Date}}
                                    <br>
                                    <!-- <i class="fa fa-clock-o booktime"></i> Time left: -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
                <!--Book 2-->
                <!-- <div class="card">
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
                </div> -->
                <div class="col-12">
                <nav aria-label="...">
                    <ul class="pagination">
                            {{ $borrow->links() }}
                    </ul>
                </nav>
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
