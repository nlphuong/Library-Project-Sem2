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
<!-- Book list -->
<br>
<div class="container">
    <div class="row ">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-dark text-white text-uppercase"><i class="fa fa-list"
                        style="font-size: small"></i> Categories</div>
                <div class="list-group cate-box">
                    <a class="list-group-item" href="{{url("books")}}">All Categories</a>
                    @foreach($cats as $c)
                    <a class="list-group-item" href="{{url("books/categories/{$c->id}")}}">{{$c->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col">
            <div class="col-12">
                <div class="row">
                    <div class="col-sm-9">
                        <div >
                            <form action="{{url("books/search")}}" method="get">
                                <div class="input-group">
                                <div class="input-group-prepend">
                                        <!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        style="border-style: hidden;">Filter by</button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">Years</a>
                                        <a class="dropdown-item" href="#">Rating</a>
                                        <a class="dropdown-item" href="#">Recommend</a>
                                    </div> -->
                                        <select name="categories" class="custom-select" style="border-style: hidden;background-color: cornsilk;border-radius: 25px 0px 0px 25px;">
                                            <option selected value="">All Categories</option>
                                            @foreach($cats as $c)
                                            <option value="{{$c->id}}" @if(isset($_GET['categories']) && $_GET['categories']==$c->id) selected @endif>{{$c->name}}</option>
                                            @endforeach
                                        </select>
                                        <!-- <select class="custom-select" style="border-style: hidden;">
                                            <option selected style="text-align: center;">Sort by</option>

                                            <option value="1">1</option>
                                            <option value="2">Two</option>
                                        <option value="3">Three</option>

                                        </select> -->
                                </div>
                                    <!-- <input type="hidden" name="search_param" value="all" id="search_param"> -->
                                    <input style="border-style: hidden;background-color: cornsilk;" type="text" class="form-control" name="txtsearch" placeholder="Search term...">
                                    <span class="input-group-btn" style="background-color: white">
                                        <button class="btn btn-default" style="background-color: cornsilk;border-radius: 0px 25px 25px 0px;"
                                            type="submit"><img src="{{asset('images/search icon_1.png')}}"
                                                alt=""></button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form action="">
                        <select id="sort" name= "sort" class="custom-select btn btn-info" style="border-style: hidden; background-color: cornsilk; border-radius: 25px;">
                            <option selected style="text-align: center;">Sort by</option>

                            <option value="1" @if(isset($_GET['sort']) && $_GET['sort']==1) selected @endif>Latest</option>
                            <option value="2" @if(isset($_GET['sort']) && $_GET['sort']==2) selected @endif>Year increase</option>
                            <option value="3" @if(isset($_GET['sort']) && $_GET['sort']==3) selected @endif>Year decrease<i class="fa fa-arrow-down" aria-hidden="true"></i></option>

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
                                <strong>Pages: &nbsp;</strong> {{$b->no_Pages}} &nbsp;pages.
                            </p>
                            <br />
                            <div class="row">
                                <div class="col-6">
                                    <!-- <p class="btn btn-danger btn-block">{{$b->price}}</p> -->
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
                        @if(isset($_GET['sort']) && !empty($_GET['sort']) && !isset($_GET['txtsearch']) && !isset($_GET['categories']))
                            {{ $books->appends(['sort' => $_GET['sort']])->links() }}
                        @elseif(!isset($_GET['sort']) && empty($_GET['sort']) && isset($_GET['txtsearch']) && isset($_GET['categories']))
                            {{ $books->appends(['categories' => $_GET['categories']])->appends(['txtsearch' => $_GET['txtsearch']])->links() }}
                        @elseif(isset($_GET['sort']) && !empty($_GET['sort']) && isset($_GET['txtsearch']) && isset($_GET['categories']))
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
