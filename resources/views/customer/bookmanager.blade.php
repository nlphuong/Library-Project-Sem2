@extends('layout.profile')

<!-- Membership detail -->
@if($membership==null||$membership->status==3)
@section('contentMembership')
<h3>Become a member at <b>Memorial Library</b> during our anniversary week and get 10% off the membership free! Get access to our more expanding collection of books event and activites.    </h3>
<a href="{{url('customer/memberPack/'.$account->id)}}" style="color: red; text-align: center;"> >>>>>Come to
							<i class="fa fa-user" style="font-size: 1em"></i>
							Membership Package to register.<<<<<</a>
@endsection
@endif
@if($membership!=null)
@section('contentProfile')
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
                            <a class="btn btn-secondary dropdown-toggle text-success" type="button"
                                id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="border-style: none; background-color: white;">
                            </a>
                            <div class="dropdown-menu text-success" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item text-success"
                                    href="{{url('customer/bookmanager/'.$account->id.'/1')}}">Waiting</a>
                                <a class="dropdown-item text-success"
                                    href="{{url('customer/bookmanager/'.$account->id.'/2')}}">Borrowing</a>
                                <a class="dropdown-item text-success"
                                    href="{{url('customer/bookmanager/'.$account->id.'/3')}}">Paid</a>
                                <a class="dropdown-item text-success"
                                    href="{{url('customer/bookmanager/'.$account->id.'/4')}}">Expired</a>
                            </div>
                        </div>
                    </div>
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
                                    <i class="fa fa-hourglass-end booktime"></i> Expire Date:
                                    {{$b->expiration_Date == null ? 'Not yet' : $b->expiration_Date}}
                                    <br>
                                    <i class="fa fa-hourglass-end booktime"></i> Return Date:
                                    {{$b->return_Date == null ? 'Not yet' : $b->return_Date}}
                                    <br>
                                    <!-- <i class="fa fa-clock-o booktime"></i> Time left: -->
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @endforeach
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
@endif
@section('script')
<script>
var element = document.getElementById("bookManage");
element.classList.add("active");
</script>
@endsection
