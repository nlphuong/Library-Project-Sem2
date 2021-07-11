@extends('layout.app')
@section('title','Books')
@section('body-class','Books-bg')
@section('main')
<link rel="stylesheet" href="{{asset('css')}}/admincss.css">
{{-- notifi success change password --}}

<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content" style="text-align: center; border-radius: 25px;">
            <div class="modal-body">
                <div class="success-checkmark">
                    <div class="check-icon" style="box-sizing: content-box !important">
                        <span class="icon-line line-tip"></span>
                        <span class="icon-line line-long"></span>
                        <div class="icon-circle"></div>
                        <div class="icon-fix"></div>
                    </div>
                </div>
                <p>
                    @if(Session::get('success'))
                    <span style="font-size: 20px;">{{Session::get('success')}}</span>
                    @endif
                    @if(Session::get('fail'))
                    <span style="font-size: 20px;">{{Session::get('fail')}}</span>
                    @endif

                </p>
            </div>
        </div>
    </div>
</div>
<div class="about-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="abouttitle">
                    <h2>Book Details</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{asset('uploads')}}/{{$books->image}}" class="d-block w-75" alt="...">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <h2>{{$books->title}}</h2>
            </div>
            <!-- <div class="row">
                    <h1>599</h1> &nbsp;&nbsp;
                    <h3><del>799</del></h3> &nbsp;&nbsp;
                    <h2 class="text-success"> 30% off</h2>
                </div> -->
            <div class="row">
                <h3 class="text-warning">
                    @for($i =1; $i <=$star; $i++) <i class="fa fa-star" aria-hidden="true"></i>
                        @endfor
                        @for($i =1; $i <= 5 - $star; $i++) <i class="fa fa-star-o" aria-hidden="true"></i>
                            @endfor
                            <!-- <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i> -->
                </h3> &nbsp;
                <h5>{{$no_star}} stars and {{$review}} reviews</h5>

            </div>
            <div class="row">
                <p><i class="text-success fa fa-user" aria-hidden="true" style="font-size: 1em"></i>
                    <strong>Authors: &nbsp;</strong> {{$books->author}}
                </p>
            </div>

            <div class="row">
                <p><i class="text-success fa fa-book" aria-hidden="true" style="font-size: 1em"></i>
                    <strong>Publisher: &nbsp;</strong> {{$books->publisher}}
                </p>
            </div>

            <div class="row">
                <p><i class="text-success fa fa-clock-o" aria-hidden="true" style="font-size: 1em"></i>
                    <strong>Year: &nbsp;</strong> {{$books->publication_Year}}
                </p>
            </div>

            <div class="row">
                <p><i class="text-success fa fa-file-text-o" aria-hidden="true" style="font-size: 1em"></i>
                    <strong>Pages: &nbsp;</strong> {{$books->no_Pages}} &nbsp;pages.
                </p>
            </div>
            <div class="row">
                <h3 class="text-info"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: 1em"></i></h3>
                <p>&nbsp; {{$books->position}} | &nbsp; <span class="text-success">available</span></p>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <h4 class="my-3"><Strong>Description:</Strong></h4>
                    </div>
                </div>
                <div class="col-md-4">
                    @if(session('accountSession'))
                    <?php
                        $flag = false;
                        foreach($cusBorrow as $cus){
                            if (intval($cus->customer_id) == session('accountSession')[0]['id']) {
                                $flag = true;
                            }
                        }
                        ?>
                    @if(!$flag)
                    <!-- Button trigger modal -->
                    <a type="button" class="btn btn- btn-lg text-success shadow borrow" data-toggle="modal"
                        data-target="#modelId">
                        <i class="fa fa-bookmark-o" aria-hidden="true" style="font-size: 1em"></i> &nbsp; Borrow
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content"
                                style="border-radius: 30px; padding: 20px;text-align: center; background-color: beige;">

                                <h5 class="modal-title">Confirm Box</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                <div class="modal-body" style="text-align: center;">
                                    <form method="POST" action="{{url('books/details/borrow')}}">
                                        @csrf
                                        <div class="form-group">
                                            <p>Hi <Strong
                                                    style="font-size: larger; font-weight: bold;">{{session('accountSession')[0]['fullname']}}</Strong>,
                                                you have registered borrow this book. So please check you info and
                                                choice your date to get this book.</p>
                                            <p>If it has any wrong, please <Strong style="font-weight: bold;">contact
                                                    with
                                                    admin</Strong>.</p>
                                            <input type="text" value="{{session('accountSession')[0]['id']}}"
                                                name="txtIdCus" style="display: none;">
                                        </div>
                                        <div class="form-group ">
                                            <label for=""
                                                style="font-style: italic;text-decoration: underline red solid;">Your
                                                info: </label>
                                            <p style="font-style: italic;">Email: &nbsp;<strong
                                                    style="font-weight: bold;">{{session('accountSession')[0]['email']}}</strong>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label for=""
                                                style="font-style: italic;text-decoration: underline red solid;">Book
                                                info:</label>
                                            <input type="text" name="txtIsbn" class="form-control"
                                                value="{{$books->isbn}}" style="display: none;" />
                                            <br>
                                            <div class="text-left">
                                                <strong class="text-success">Title: &nbsp;</strong>{{$books->title}}
                                                <br>
                                                <strong class="text-success">Authors: &nbsp;</strong> {{$books->author}}
                                                <br>
                                                <strong class="text-success">Publisher: &nbsp;</strong>
                                                {{$books->publisher}} <br>


                                            </div>
                                            <p><i class="text-info fa fa-map-marker" aria-hidden="true"
                                                    style="font-size: 1em"></i>
                                                &nbsp; {{$books->position}} | &nbsp; <span
                                                    class="text-success">available</span></p>

                                        </div>
                                        <div class="row">

                                        </div>
                                        <div class="form-group">
                                            <label for=""
                                                style="font-style: italic;text-decoration: underline red solid;">Select
                                                date:</label>
                                            <input type="date" name="selectDate" class="form-control"
                                                value="<?php echo date('Y-m-j',strtotime ( '+1 day' , strtotime ( date('Y-m-j') ) )); ?>"/>
                                            <br>
                                            <label for="">
                                                <p style="font-style: italic;">***Kindly noted that, you will have 24h
                                                    to get your book from your selected date.</p>
                                            </label>
                                        </div>
                                        @error('selectDate')
                                        <div class="alert alert-danger" role="alert">
                                            {{$message}}
                                        </div>
                                        @enderror

                                        <div class="form-group">
                                            <input type="submit" name="btnborrow" class="btn btn-info"
                                                value="Confirm" />
                                        </div>
                                    </form>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @else
                    <a type="button" class="btn btn- btn-lg text-success shadow borrow" data-toggle="modal"
                        data-target="#modelId">
                        <i class="fa fa-bookmark-o" aria-hidden="true" style="font-size: 1em"></i> &nbsp; Borrowed
                    </a>
                    <!-- Modal -->
                    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content"
                                style="border-radius: 30px; padding: 20px;text-align: center; background-color: beige;">

                                <h5 class="modal-title">Confirm Box</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                                <div class="modal-body" style="text-align: center;">
                                    <p>You have registered to borrow this book. Thanks!</p>
                                </div>
                                <!-- <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    @endif
                    @endif
                </div>
            </div>

            <div class="row" style="text-align: left;">
                {!! $books->content !!}
            </div>
        </div>
    </div>
</div>
<br>

<div class="similar">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="similartitle">
                    <h2>Similar Books</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5">
        @foreach($relateBooks as $b)
        <div class="col-md-3">
            <div class="card-detail">
                <img src="{{asset('uploads')}}/{{$b->image}}" style="height: 300px;" class="card-img-top img-fluid"
                    alt="">
                <div class="card-title" style="height: 70px;">
                    <h4><a href="{{url("books/detail/{$b->isbn}")}}" title="View Product">{{$b->title}}</a></h4>

                </div>
                <div class="card-text">
                    <strong>Authors: &nbsp;</strong> {{$b->author}}.<br />
                    <br>
                    <a href="{{url("books/detail/{$b->isbn}")}}" class="btn btn-danger text-light"><i class="fa fa-book"
                            aria-hidden="true" style="font-size: 1em"></i>&nbsp;
                        Detail</a>
                    <br><br>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="similar">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="similartitle">
                    <h2>Rating & Reviews</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-5 mb-5">
    @if(session('accountSession'))
    <div class="container shadow" style="border-radius: 15px; padding: 30px;">
        <div class="row mb-5 text-left">
            <strong>
                <h2 style="font-size: 30px;">Post your Own Reviews:</h2>
            </strong>
        </div>
        <div class="alert alert-success" id="validSuccess"
            style="display: none; font-size: larger; color: red; text-align: center;"> </div>
        <h4 class="text-center mt-2 mb-4">
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_1" data-rating="1"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_2" data-rating="2"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_3" data-rating="3"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_4" data-rating="4"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_5" data-rating="5"></i>
        </h4>
        <div class="form-group">
            <input type="text" value="{{session('accountSession')[0]['id']}}" id="user_id" style="display: none;" />
            <input type="text" value="{{$books->isbn}}" id="isbn" style="display: none;" />
        </div>
        <div class="form-group">
            <label for="Write your feedback">Write your feedback</label>
            <textarea class="form-control" id="user_review" rows="3" placeholder="enter your review"></textarea>
        </div>
        <div class="alert alert-danger" id="validTitle"
            style="display: none; font-size: larger; color: red; text-align: center;"> </div>
        <div class="form-group" style="text-align: center;">
            <button type="submit" class="btn btn-primary" id="save_review" style="background-color: #b32137;
    background-image: linear-gradient(#b32137, #550002);">Submit</button>
        </div>
    </div>
    <br>
    <br>
    @endif
    @foreach($rate as $r)
    <div class="card shadow" style="border: none; border-radius: 150px; background-color: beige; padding: 30px;">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-2" style="display:flex; align-items: center;">
                <img style="width: 150px; height: 150px; border-radius: 50%;" src="{{asset('uploads')}}/{{$r->image}}"
                    alt="Card image cap">
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h4 class="mt-0" style="font-size: 20px;">
                        {{$r->gender == 1 ? 'Ms' : 'Mrs'}}.&nbsp;&nbsp;{{$r->fullname}}</h4>
                    <p class="card-text">
                        {{$r->comment}}
                    </p>
                    <br />
                    <!-- {!! $b->content !!} -->
                </div>
            </div>
            <div class="col-sm-3" style="display:flex; align-items: center;">
                <h4>&nbsp;&nbsp;<span class="text-warning">
                        @for($i =1; $i <= $r->rating; $i++)
                            <i class="fa fa-star" aria-hidden="true"></i>
                            @endfor
                            @for($i =1; $i <=5 - $r->rating; $i++)
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endfor
                    </span></h4>
            </div>
            <div class="col-sm-2"></div>
        </div>
    </div>
    <br>
    @endforeach
    <div class="row mb-5">
        <span style="position: absolute; right: 160px;">{!! $rate->links() !!}</span>
    </div>
    <br>

</div>
@endsection
@section('script')
@if(Session::has('success') )
<script>
$(document).ready(function() {
    $('#modal-id').modal('show');

});
</script>
@endif
@error('selectDate')
<script>
$(document).ready(function() {
    $('#modelId').modal('show');
})
</script>
@enderror
@endsection
