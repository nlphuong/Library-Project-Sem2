@extends('layout.app')
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
<!-- Book list -->
<br>
<div class="container">
    <div class="row ">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header text-black text-uppercase" style="background-color: cornsilk"><i
                        class="fa fa-list" style="font-size: small"></i> Categories</div>
                <div class="list-group cate-box">
                    <a class="list-group-item" href="{{url("books")}}">All Categories</a>
                    @foreach($cats as $c)
                    <a class="list-group-item" href="{{url("books/categories/{$c->id}")}}">{{$c->name}}</a>
                    @endforeach
                </div>
            </div>
            <!--Carousel-->
            @if(count($arr) >= 1)
            <div class="card bg-light mb-3">
                <div class="card-header bg-dark">
                    <!-- Left and right controls -->
                    <a class="btn btn-outline-light btn-sm prev ml-0" href="#myCarousel" data-slide="prev"
                        style="border-style: none;">
                        <i class="fa fa-lg fa-chevron-left text-left" style="font-size: 1.1em;"></i>
                        <span class="sr-only">Previous</span>
                    </a>
                    <span class="text-white text-uppercase text-md-center">Maybe you like this !</span>
                    <a class="btn btn-outline-light btn-sm next mr-0" href="#myCarousel" data-slide="next"
                        style="border-style: none;">
                        <i class="fa fa-lg fa-chevron-right text-right"
                            style="font-size: 1.1em; border-style: none;"></i>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php $avg = floor($arr[0]->totalstar/$arr[0]->totalreview); ?>
                        <div class="carousel-item active">
                            <div class="card" style="text-align: center;">
                            <a href="{{url("books/detail/{$arr[0]->isbn}")}}"><img src="{{asset('uploads')}}/{{$arr[0]->image}}" style="height: 250px; width: auto;"
                                    class="card-img-top img-fluid" alt=""></a>
                                <div class="card-title" style="height: 70px;">
                                    <h4><a href="{{url("books/detail/{$arr[0]->isbn}")}}" title="View Product">{{$arr[0]->title}}</a></h4>

                                </div>
                                <div class="card-text">
                                    <!-- <strong>Authors: &nbsp;</strong>{{$arr[0]->author}}.<br /> -->

                                    <h3 class="text-warning">
                                    @for($i =1; $i <=$avg; $i++) <i class="fa fa-star" aria-hidden="true" style="font-size: 1em"></i>
                                        @endfor
                                        @for($i =1; $i <= 5 - $avg; $i++) <i class="fa fa-star-o" aria-hidden="true" style="font-size: 1em">
                                            </i>
                                            @endfor
                                    </h3>
                                    <!-- <a href="{{url("books/detail/{$arr[0]->isbn}")}}" class="btn btn-danger text-light"><i class="fa fa-book"
                                            aria-hidden="true" style="font-size: 1em"></i>&nbsp;
                                        Review</a>
                                    <br><br> -->
                                </div>
                            </div>
                        </div>
                        @if(count($arr) > 1)
                        <?php if(count($arr) < 5){
                            $count = count($arr);
                        }else{
                            $count = 5;
                        } ?>

                        <?php for($i = 1; $i < $count; $i++){
                        $avg = floor($arr[$i]->totalstar/$arr[$i]->totalreview); ?>
                        <div class="carousel-item">
                            <div class="card" style="text-align: center;">
                            <a href="{{url("books/detail/{$arr[$i]->isbn}")}}"><img src="{{asset('uploads')}}/{{$arr[$i]->image}}" style="height: 250px;"
                                    class="card-img-top img-fluid" alt=""></a>
                                <div class="card-title" style="height: 70px;">
                                    <h4><a href="{{url("books/detail/{$arr[$i]->isbn}")}}" title="View Product">{{$arr[$i]->title}}</a></h4>

                                </div>
                                <div class="card-text">
                                    <!-- <strong>Authors: &nbsp;</strong>{{$arr[$i]->author}}.<br /> -->
                                    <h3 class="text-warning">
                                    @for($j =1; $j <= $avg; $j++) <i class="fa fa-star" aria-hidden="true" style="font-size: 1em"></i>
                                        @endfor
                                        @for($j =1; $j <= 5 - $avg; $j++) <i class="fa fa-star-o" aria-hidden="true" style="font-size: 1em">
                                            </i>
                                            @endfor
                                    </h3>
                                    <!-- <a href="{{url("books/detail/{$arr[$i]->isbn}")}}" class="btn btn-danger text-light"><i class="fa fa-book"
                                            aria-hidden="true" style="font-size: 1em"></i>&nbsp;
                                        Review</a>
                                    <br><br> -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        @endif
                    </div>
                    <!--End slide-->
                </div>
            </div>
            @endif
            <!--End carousel-->
        </div>

        <div class="col">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-9">
                        <div>
                            <form action="{{url("books/search")}}" method="get">
                                <div class="input-group">
                                    <div class="input-group-prepend">

                                        <select name="categories" class="custom-select"
                                            style="border-style: hidden;background-color: cornsilk;border-radius: 25px 0px 0px 25px;">
                                            <option selected value="">All Categories</option>
                                            @foreach($cats as $c)
                                            <option value="{{$c->id}}" @if(isset($_GET['categories']) &&
                                                $_GET['categories']==$c->id) selected @endif>{{$c->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                    <!-- <input type="hidden" name="search_param" value="all" id="search_param"> -->
                                    <input style="border-style: hidden;background-color: cornsilk;" type="text"
                                        class="form-control" name="txtsearch" placeholder="Search book's name...">
                                    <span class="input-group-btn" style="background-color: white">
                                        <button class="btn btn-default"
                                            style="background-color: cornsilk;border-radius: 0px 25px 25px 0px;"
                                            type="submit"><img src="{{asset('images/search icon_1.png')}}"
                                                alt=""></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form action="">
                            <select id="sort" name="sort" class="custom-select"
                                style="border-style: hidden; background-color: cornsilk; border-radius: 25px;">
                                <option selected style="text-align: center;">Sort by</option>

                                <option value="1" @if(isset($_GET['sort']) && $_GET['sort']==1) selected @endif>Latest
                                </option>
                                <option value="4" @if(isset($_GET['sort']) && $_GET['sort']==4) selected @endif>Price
                                    increase</option>
                                <option value="5" @if(isset($_GET['sort']) && $_GET['sort']==5) selected @endif>Price
                                    decrease<i class="fa fa-arrow-down" aria-hidden="true"></i></option>
                                <option value="2" @if(isset($_GET['sort']) && $_GET['sort']==2) selected @endif>Year
                                    increase</option>
                                <option value="3" @if(isset($_GET['sort']) && $_GET['sort']==3) selected @endif>Year
                                    decrease<i class="fa fa-arrow-down" aria-hidden="true"></i></option>

                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <br>
            @foreach($books as $b)
            <div class="card">
                <div class="row">
                    <div class="col-sm-5" style="display:flex; align-items: center;">
                        <img style="width: 60%; height: 250px;" src="{{asset('uploads')}}/{{$b->image}}"
                            alt="Card image cap">
                    </div>
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h4 class="card-title"><a href="{{url("books/detail/{$b->isbn}")}}"
                                    title="View Product">{{$b->title}}</a></h4>
                            <p class="card-text">
                                <i class="text-success fa fa-user" aria-hidden="true" style="font-size: 1em"></i>
                                <strong>Authors: &nbsp;</strong> {{$b->author}} &nbsp; <br />
                                <i class="text-success fa fa-book" aria-hidden="true" style="font-size: 1em"></i>
                                <strong>Publisher: &nbsp;</strong> {{$b->publisher}}<br />
                                <i class="text-success fa fa-clock-o" aria-hidden="true" style="font-size: 1em"></i>
                                <strong>Year: &nbsp;</strong> {{$b->publication_Year}}<br />
                                <i class="text-success fa fa-file-text-o" aria-hidden="true" style="font-size: 1em"></i>
                                <strong>Pages: &nbsp;</strong> {{$b->no_Pages}} &nbsp;pages.<br/>
                                <i class="text-success fa fa-money" aria-hidden="true" style="font-size: 1em"></i>
                                <strong>Market price: &nbsp;</strong> {{$b->price}}&nbsp;<i class="fa fa-usd" aria-hidden="true" style="font-size: 1em"></i>
                            </p>
                            <br />
                            <div class="row">
                                <div class="col-6">

                                </div>
                                <div class="col-6">
                                    <br>
                                    <a href="{{url("books/detail/{$b->isbn}")}}"
                                        class="btn btn-info btn-block">Review</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            @endforeach
            <div class="col-12">
                <nav aria-label="...">
                    <ul class="pagination">
                        @if(isset($_GET['sort']) && !empty($_GET['sort']) && !isset($_GET['txtsearch']) &&
                        !isset($_GET['categories']))
                        {{ $books->appends(['sort' => $_GET['sort']])->links() }}
                        @elseif(!isset($_GET['sort']) && empty($_GET['sort']) && isset($_GET['txtsearch']) &&
                        isset($_GET['categories']))
                        {{ $books->appends(['categories' => $_GET['categories']])->appends(['txtsearch' => $_GET['txtsearch']])->links() }}
                        @elseif(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['txtsearch']) &&
                        isset($_GET['categories']))
                        {{ $books->appends(['categories' => $_GET['categories']])->appends(['txtsearch' => $_GET['txtsearch']])->appends(['sort' => $_GET['sort']])->links() }}
                        @else
                        {{ $books->links() }}
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<br>
@endsection
