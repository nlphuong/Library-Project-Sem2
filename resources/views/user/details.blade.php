@extends('layout.appIndex')
@section('title','Books')
@section('body-class','Books-bg')
@section('main')
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
                <p><i class="text-success fa fa-user" aria-hidden="true"></i>
                    <strong>Authors: &nbsp;</strong> {{$books->author}}
                </p>
            </div>
            <br>
            <div class="row">
                <p><i class="text-success fa fa-book" aria-hidden="true"></i>
                    <strong>Publisher: &nbsp;</strong> {{$books->publisher}}
                </p>
            </div>
            <br>
            <div class="row">
                <p><i class="text-success fa fa-clock-o" aria-hidden="true"></i>
                    <strong>Year: &nbsp;</strong> {{$books->publication_Year}}
                </p>
            </div>
            <br>
            <div class="row">
                <p><i class="text-success fa fa-file-text-o" aria-hidden="true"></i>
                    <strong>Pages: &nbsp;</strong> {{$books->no_Pages}} &nbsp;pages.
                </p>
            </div>
            <br>
            <!-- <div class="row">
                <p><i class="text-success fa fa-check-circle" aria-hidden="true"></i>
                    <strong>Position: &nbsp;</strong> {{$books->position}} &nbsp;
                </p>
            </div> -->
            <div class="row">
                <div class="col-md-8">
                    <div class="row mt-4">
                        <h3 class="text-info"><i class="fa fa-map-marker" aria-hidden="true"></i></h3>
                        <p style="font-size: 20px;">&nbsp; {{$books->position}} | &nbsp; <span
                                class="text-success">available</span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="" class="btn btn-primary text-light"><i class="fa fa-bookmark-o" aria-hidden="true"
                            style="font-size: 1em"></i> &nbsp; Borrow</a>&nbsp;
                    <!-- <a href="" class="btn btn-danger text-light">Red</a>&nbsp;
                <a href="" class="btn btn-warning text-light">Yellow</a>&nbsp;
                <a href="" class="btn btn-success text-light">Green</a>&nbsp;
                <a href="" class="btn btn-info text-light">Blue</a> -->
                </div>
            </div>
            <br>

            <!-- <div class="row mt-4">
                <h4>Size: &nbsp; &nbsp;</h4>
                <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select sizes
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">small</a>
                        <a class="dropdown-item" href="#">medium</a>
                        <a class="dropdown-item" href="#">large</a>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <h4>colors: &nbsp;&nbsp;</h4>
                <a href="" class="btn btn-primary text-light">Sky Blue</a>&nbsp;
                <a href="" class="btn btn-danger text-light">Red</a>&nbsp;
                <a href="" class="btn btn-warning text-light">Yellow</a>&nbsp;
                <a href="" class="btn btn-success text-light">Green</a>&nbsp;
                <a href="" class="btn btn-info text-light">Blue</a>
            </div>
            <br>
            <div class="row">
                <h4>Seller: &nbsp; &nbsp;</h4>
                <p style="font-size: 18px;">G.M Garments</p>
            </div> -->
            <div class="row">
                <h4 class="my-3"><Strong>Description:</Strong></h4>
            </div>
            <div class="row" style="text-align: left;">
                {!! $books->content !!}
            </div>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row">
        <h2 class="my-4">Similar Books</h2>
    </div>
    <div class="row mt-5">
        @foreach($relateBooks as $b)
        <div class="col-md-3">
            <div class="card-detail">
                <img src="{{asset('uploads')}}/{{$b->image}}" style="height: 300px;" class="card-img-top img-fluid"
                    alt="">
                <div class="card-title">
                    <h4><a href="{{url("books/detail/{$b->isbn}")}}" title="View Product">{{$b->title}}</a></h4>
                </div>
                <div class="card-text">
                    <strong>Authors: &nbsp;</strong> {{$b->author}}.<br />
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
<div class="container mt-5 mb-5">
    <div class="row">
        <h2>Rating & Reviews</h2>
    </div>
    <!-- @foreach($rate as $r)
    <div class="row mb-5">
        <div class="media">
            <div class="col-sm-5" style="display:flex; align-items: center;">
                <img class="mr-3" style="width: 300px; height: 200px;" src="{{asset('uploads')}}/{{$r->image}}"
                    alt="Generic placeholder image">
            </div>
            <div class="col-sm-7">
                <div class="media-body">
                    <div class="row">
                        <h5 class="mt-0">{{$r->fullname}}<span class="text-warning">
                                @for($i =1; $i <= $r->rating; $i++)
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    @endfor
                                    @for($i =1; $i <=5 - $r->rating; $i++)
                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                        @endfor
                            </span></h5>
                    </div>
                    <div class="row">
                        {{$r->comment}}
                    </div>

                </div>
            </div>
        </div>
        <br>
    </div>
    @endforeach -->

    @foreach($rate as $r)
    <div class="card">
        <div class="row">
            <div class="col-sm-3" style="display:flex; align-items: center;">
                <img style="width: 150px; height: 100px;" src="{{asset('uploads')}}/{{$r->image}}" alt="Card image cap">
            </div>
            <div class="col-sm-6">
                <div class="card-body">
                    <h4 class="mt-0">{{$r->fullname}}</h4>
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
        </div>
    </div>
    <br>
    @endforeach
    <div class="row mb-5">
        <span style="position: absolute; right: 160px;">{!! $rate->links() !!}</span>
    </div>
    <br>
    @if(session('accountSession'))
    <div class="row mb-5" style="text-align: right;">
        <h2>Post your Own Reviews</h2>
    </div>

    <!-- <div class="row">
        <ul class="list-inline" title="Average Rating">
                @for($count=1; $count<=5; $count++)
                    @php
                    if($count <= $star){
                        $color = 'color:#ffcc00;';
                    }else{
                        $color = 'color:#ccc;';
                    }
                    @endphp
                    <li title="Rating"
                    id="{{$books->isbn}}-{{$count}}"
                    data-index="{{$count}}"
                    data-product_id="{{$books->isbn}}"
                    data-rating="{{$star}}"
                    class="rating list-inline-item" style="cursor: pointer; {{$color}}; font-size: 30px;">
                    &#9733;
                    </li>
                @endfor
            </ul>
        <h4 class="text-warning mt-2 mb-4">
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
            <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
        </h4>
    </div> -->

    <div class="row">
        <h4 class="text-center mt-2 mb-4">
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_1" data-rating="1"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_2" data-rating="2"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_3" data-rating="3"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_4" data-rating="4"></i>
            <i class="fa fa-star star-light submit_star mr-1" aria-hidden="true" id="submit_star_5" data-rating="5"></i>
        </h4>
    </div>
    <div class="form-group">
        <input type="text" value="{{session('accountSession')[0]['id']}}" id="user_id" style="display: none;" />
        <input type="text" value="{{$books->isbn}}" id="isbn" style="display: none;" />
    </div>
    <div class="form-group">
        <label for="Write your feedback">Write your feedback</label>
        <textarea class="form-control" id="user_review" rows="3" placeholder="enter your review"></textarea>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" id="save_review">Submit</button>
    </div>

    @endif
</div>

@endsection
