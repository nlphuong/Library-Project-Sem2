@extends('layout.admin.index')
@section('main')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
    <link rel="stylesheet" href="{{asset('css')}}/footable.bootstrap.css">
    <link rel="stylesheet" href="{{asset('css')}}/footable.bootstrap.min.css">
@endsection

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            BORROW BOOKS
          <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Borrow books</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
         <!-- Default box -->
         <div class="box">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
                    <div class=" ">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-primary">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            PENDING
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">
                                        <table id="accordion-example-1" class="table" data-paging="true" data-filtering="true" data-sorting="true">
                                            <thead>
                                                <tr style="background-color: darkgrey">
                                                    <th>Email customer</th>
                                                    <th>Phone</th>
                                                    <th>Quantity</th>
                                                    <th>Arrival date </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($pending as $p)
                                                <tr>
                                                    <td>{{$p->account->email}}</td>
                                                    <td>{{$p->account->phone}}</td>
                                                    <td>{{$p->total}}</td>
                                                    <td>{{date('d-m-Y',strtotime($p->borrowed_From))}}</td>
                                                    <td>
                                                        <a href="{{url('admin/borrowdetail/'.$p->customer_id).'/'.$p->borrowed_From}}" class="btn btn-success">Approved</a>
                                                        {{-- <div class="btn-group" style="display: inline-flex !important">
                                                            <button type="button" class="btn btn-info">Action</button>
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <button style="border: none;background:none" class="dropdown-fix" type="button" data-toggle="modal" data-target="#my-modal{{$d->id}}">Detail</button>
                                                                </li>

                                                            </ul>

                                                        </div> --}}
                                                    </td>
                                                    {{-- <div id="my-modal{{$d->id}}" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                        <div class="modal-dialog" role="document" style="width: 60%">
                                                            <div class="modal-content" style="border: 5px solid #00acd6; " >
                                                                <div class="modal-header" >
                                                                    <h3 class="modal-title text-center" style="font-weight: bold"  id="my-modal-title">BORROW DETAIL</h3>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-3">

                                                                          <!-- Profile Image -->
                                                                          <div class="box box-primary">
                                                                            <div class="box-body box-profile">
                                                                              <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads')}}/{{$d->account->image}}" alt="User profile picture">
                                                                              <h3 class="profile-username text-center">{{$d->account->fullname}}</h3>
                                                                              <strong><i class="fa fa-envelope-open margin-r-5"></i> Mail</strong>
                                                                              <p class="text-muted">
                                                                                {{$d->account->email}}
                                                                              </p>
                                                                              <hr>
                                                                              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                                                                              <p class="text-muted">{{$d->account->address}}</p>
                                                                              <hr>
                                                                              <strong><i class="fa fa-user-circle margin-r-5"></i> Date of birth</strong>
                                                                              <p class="text-muted">{{$d->account->birthday}}</p>
                                                                              <hr>
                                                                              <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                                                                              <p class="text-muted">{{$d->account->phone}}</p>

                                                                            </div>
                                                                            <!-- /.box-body -->
                                                                          </div>
                                                                          <!-- /.box -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-md-9">
                                                                          <div class="nav-tabs-custom">
                                                                            <ul class="nav nav-tabs">
                                                                              <li class="active"><a href="#settings" data-toggle="tab">Borrow information</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                              <div class="row">
                                                                                  <div class="col-sm-3">
                                                                                        <img src="{{asset('uploads/'.$d->book->image)}}" width="100%" alt="">
                                                                                  </div>
                                                                                  <div class="col-sm-9">
                                                                                    <ul class="list-group list-group-unbordered">

                                                                                        <li class="list-group-item">
                                                                                          <b>Title</b> <a class="pull-right">{{$d->book->title}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Author</b> <a class="pull-right">{{$d->book->author}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Publisher</b> <a class="pull-right">{{$d->book->publisher}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Publication Year</b> <a class="pull-right">{{$d->book->publication_Year}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Price</b> <a class="pull-right">{{$d->book->price}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Price</b> <a class="pull-right">{{$d->book->price}}</a>
                                                                                        </li>
                                                                                      </ul>
                                                                                  </div>
                                                                              </div>
                                                                            </div>
                                                                            <!-- /.tab-content -->
                                                                          </div>
                                                                          <!-- /.nav-tabs-custom -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-warning">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            ABOUT TO EXPIRE
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table id="accordion-example-2" class="table" data-paging="true" data-filtering="true" data-sorting="true">
                                            <thead>
                                                <tr style="background-color: darkgrey">
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Book title</th>
                                                    <th>Start date</th>
                                                    <th>Expiration Date</th>
                                                    <th>Duration</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($aboutExpire as $d)
                                                <tr>
                                                    <td>{{$d->account->email}}</td>
                                                    <td>{{$d->account->phone}}</td>
                                                    <td>{{$d->book->title}}</td>
                                                    <td>{{$d->borrowed_From}}</td>
                                                    <td>{{$d->expiration_Date}}</td>
                                                    <td>
                                                        <?php $t= strtotime($d->expiration_Date) - strtotime(now());

                                                            $hour=floor($t/3600);
                                                            $minute=floor(($t- $hour*60*60)/60);
                                                            echo $hour.' hours '.$minute.' minute';

                                                        ?>
                                                    </td>
                                                    <td>
                                                        {{-- <a href="{{url('admin/borrowdetail/'.$d->customer_id).'/'.$d->borrowed_From}}" class="btn btn-success">Approved</a> --}}
                                                        <div class="btn-group" style="display: inline-flex !important">
                                                            <button type="button" class="btn btn-info">Action</button>
                                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li>
                                                                    <button style="border: none;background:none" class="dropdown-fix" type="button" data-toggle="modal" data-target="#my-modal{{$d->id}}">Detail</button>
                                                                </li>
                                                                <li><a href="{{url('admin/returnBook/'.$d->id.'/'.$d->book_isbn)}}">Return book</a></li>

                                                            </ul>

                                                        </div>
                                                    </td>
                                                    <div id="my-modal{{$d->id}}" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                        <div class="modal-dialog" role="document" style="width: 50%">
                                                            <div class="modal-content" style="border: 5px solid #00acd6; " >
                                                                <div class="modal-header" >
                                                                    <h3 class="modal-title text-center" style="font-weight: bold"  id="my-modal-title">BORROW DETAIL</h3>
                                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-3">

                                                                          <!-- Profile Image -->
                                                                          <div class="box box-primary">
                                                                            <div class="box-body box-profile">
                                                                              <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads')}}/{{$d->account->image}}" alt="User profile picture">
                                                                              <h3 class="profile-username text-center">{{$d->account->fullname}}</h3>
                                                                              <strong><i class="fa fa-envelope-open margin-r-5"></i> Mail</strong>
                                                                              <p class="text-muted">
                                                                                {{$d->account->email}}
                                                                              </p>
                                                                              <hr>
                                                                              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                                                                              <p class="text-muted">{{$d->account->address}}</p>
                                                                              <hr>
                                                                              <strong><i class="fa fa-user-circle margin-r-5"></i> Date of birth</strong>
                                                                              <p class="text-muted">{{$d->account->birthday}}</p>
                                                                              <hr>
                                                                              <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                                                                              <p class="text-muted">{{$d->account->phone}}</p>

                                                                            </div>
                                                                            <!-- /.box-body -->
                                                                          </div>
                                                                          <!-- /.box -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-md-9">
                                                                          <div class="nav-tabs-custom" style="box-shadow: none !important">
                                                                            <ul class="nav nav-tabs">
                                                                              <li class="active"><a href="#settings" data-toggle="tab">Borrow information</a></li>
                                                                            </ul>
                                                                            <div class="tab-content">
                                                                              <div class="row">
                                                                                  <div class="col-sm-4">
                                                                                        <img src="{{asset('uploads/'.$d->book->image)}}" width="100%" alt="">
                                                                                  </div>
                                                                                  <div class="col-sm-8">
                                                                                    <ul class="list-group list-group-unbordered">

                                                                                        <li class="list-group-item">
                                                                                          <b>Title</b> <a class="pull-right">{{$d->book->title}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Author</b> <a class="pull-right">{{$d->book->author}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Publisher</b> <a class="pull-right">{{$d->book->publisher}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Publication Year</b> <a class="pull-right">{{$d->book->publication_Year}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b><i class="fa fa-hourglass-start" style="margin-right: 15px"></i>Start date</b> <a class="pull-right">{{$d->borrowed_From}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b><i class="fa fa-hourglass-end" style="margin-right: 15px"></i>Expiration date</b> <a class="pull-right">{{$d->expiration_Date}}</a>
                                                                                        </li>
                                                                                        <li class="list-group-item">
                                                                                          <b>Status</b> <a class="pull-right"><span style="padding-left: 5px" class="label label-warning">Pending</span></a>
                                                                                        </li>

                                                                                      </ul>
                                                                                  </div>
                                                                                  <div class="col-sm-12">
                                                                                    <a href="{{url('admin/returnBook/'.$d->id.'/'.$d->book_isbn)}}" type="submit" class="btn btn-success pull-right"><i class="fa fa-sign-in"></i> Return book</a>
                                                                                    <a href="" target="_blank" class="btn btn-default pull-right"><i class="fa fa-envelope"></i> Send Email</a>
                                                                                  </div>
                                                                              </div>
                                                                            </div>
                                                                            <!-- /.tab-content -->
                                                                          </div>
                                                                          <!-- /.nav-tabs-custom -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                      </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-danger" >
                                <div class="panel-heading" role="tab" id="headingTwo" >
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            EXPIRED
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body">
                                        <table id="accordion-example-3" class="table" data-paging="true" data-filtering="true" data-sorting="true">
                                            <thead>
                                                <tr style="background-color: darkgrey">
                                                    <th>Email customer</th>
                                                    <th>Phone</th>
                                                    <th>Quantity</th>
                                                    <th>Expiration Date</th>
                                                    <th>status</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($borrowExpired as $b)
                                                <tr>
                                                    <td>{{$b->account->email}}</td>
                                                    <td>{{$b->account->phone}}</td>
                                                    <td>{{$b->total}}</td>
                                                    <td>{{$b->expiration_Date}}</td>
                                                    <td><span class="label label-danger">Locked</span></td>
                                                    <td>
                                                        <a href="{{url('admin/expiredDetail/'.$b->customer_id)}}" class="btn btn-primary">Detail</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection
@section('js')
<script src="{{asset('js/footable.js')}}"></script>
<script src="{{asset('js/footable.min.js')}}"></script>
<script>
    jQuery(function($){
	$('#accordion-example-1,#accordion-example-2,#accordion-example-3,#accordion-example-4').footable();
});
</script>
@endsection
