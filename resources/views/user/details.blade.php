@extends('layout.appIndex')
@section('title','Books')
@section('body-class','Books-bg')
@section('main')
<div class="about-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="abouttitle">
                    <h2>Our Books</h2>
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
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </h3> &nbsp;
                <!-- <h5>1200 start and 250 review</h5> -->

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
                                class="text-success">avaible</span></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="" class="btn btn-primary text-light"><i class="fa fa-bookmark-o" aria-hidden="true"></i> &nbsp; Borrow</a>&nbsp;
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
                <h4><Strong>Description:</Strong></h4>
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
        <h2>Similar Books</h2>
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
                    <a href="" class="btn btn-danger text-light"><i class="fa fa-book" aria-hidden="true"></i>&nbsp;
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
    <div class="row mb-5">
        <div class="media">
            <img class="mr-3" src="{{asset('uploads')}}/{{'avatar.jpg'}}" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">Media heading <span class="text-warning">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </span></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
        <br>
        <div class="media">
            <img class="mr-3" src="{{asset('uploads')}}/{{'avatar.jpg'}}" alt="Generic placeholder image">
            <div class="media-body">
                <h5 class="mt-0">Media heading <span class="text-warning">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-half-o" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </span></h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus
                odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
                fringilla. Donec lacinia congue felis in faucibus.
            </div>
        </div>
    </div>
    <!-- <br>
        <br>
        <div class="row mb-5">
            <h2>Post your Own Reviews</h2>
        </div>
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <form>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <input style="border-style: inset;" class="form-control" placeholder="Email" name="email" type="Email">
                    </div>
                    <br/>
                    <br/>
                    <div class="col-sm-12">
                        <textarea style="border-style: inset;" class="textarea" name="message" placeholder="Message">Message</textarea>
                    </div>
                </div>
            </form>
        </div>
        <button class="send-btn">Send</button> -->
</div>

@endsection
