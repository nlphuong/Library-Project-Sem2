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
<!-- test -->
<br>
<div class="container">
    <div class="row ">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-dark text-white text-uppercase"><i class="fa fa-list" style="font-size: small"></i> Categories
                </div>
                <div class="list-group cate-box">
                    <!-- <li class="list-group-item"><a href="category.html">Cras justo odio</a></li>
                    <li class="list-group-item"><a href="category.html">Dapibus ac facilisis in</a></li>
                    <li class="list-group-item"><a href="category.html">Morbi leo risus</a></li>
                    <li class="list-group-item"><a href="category.html">Porta ac consectetur ac</a></li>
                    <li class="list-group-item"><a href="category.html">Vestibulum at eros</a></li> -->
                    <a class="list-group-item" href="{{url("books")}}">All Categories</a>
                    @foreach($cats as $c)
                    <a class="list-group-item" href="{{url("books/categories/{$c->id}")}}">{{$c->name}}</a>
                    @endforeach
                </div>
            </div>
            <!-- <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Last product</div>
                <div class="card-body">
                    <img class="img-fluid" src="https://dummyimage.com/600x400/55595c/fff" />
                    <h5 class="card-title">Product title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                    <p class="bloc_left_price">99.00 $</p>
                </div>
            </div> -->
        </div>

        <div class="col">
            <div class="card">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" 
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter by</button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Years</a>
                                    <a class="dropdown-item" href="#">Rating</a>
                                    <a class="dropdown-item" href="#">Recommend</a>
                                </div>
                            </div>
                            <input type="hidden" name="search_param" value="all" id="search_param">
                            <input type="text" class="form-control" name="x" placeholder="Search term...">
                            <!--<select name="cars" id="cars">
                                <option value="volvo">Volvo</option>
                                <option value="saab">Saab</option>
                                <option value="mercedes">Mercedes</option>
                                <option value="audi">Audi</option>
                            </select> -->
                            <span class="input-group-btn" style="background-color: white">
                                <button class="btn btn-default" style="background-color: white" type="button"><img
                                        src="{{asset('images/search icon_1.png')}}" alt=""></button>
                            </span>
                        </div>
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
                            <!-- {!! $b->content !!} -->

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
            <!--
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="https://dummyimage.com/600x400/55595c/fff" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="product.html" title="View Product">Product title</a></h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">99.00 $</p>
                                </div>
                                <div class="col">
                                    <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                 -->

            <div class="col-12">
                <nav aria-label="...">
                    <ul class="pagination">
                        <!-- <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">Previous</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li> -->
                        {!! $books->links() !!}
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</div>
<br>
@endsection
