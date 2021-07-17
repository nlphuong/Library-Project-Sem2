
@extends('layout.admin.index')
@section('css')
  <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

@section('main')
@if(Session::has('Success'))
<script>
    $(document).ready(function () {
        $('#modal-id').modal('show');
    });
</script>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            CUSTOMER ACCOUNT
          <small></small>
        </h1>
         <ol class="breadcrumb">
          <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li><a class="active">Account</a></li>
          <li class="active">Customer</li>
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
                        <table id="table_id" class="display table-bordered">
                            <thead>
                                <tr style="color: white;background-color: darkslategrey">
                                    <th></th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Address</th>
                                    <th>Day of birth</th>
                                    <th class="text-center" style="width: 100px">Phone</th>
                                    <th class="text-center">Status</th>
                                    <th style="width: 50px"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td></td>
                                    <td>{{$d->fullname}}</td>
                                    <td>{{$d->email}}</td>
                                    <td class="text-center">@if($d->gender==1) Male @else Female @endif</td>
                                    <td class="text-center">{{$d->address}}</td>
                                    <td>{{$d->birthday}}</td>
                                    <td class="text-center">{{$d->phone}}</td>
                                    <td class="text-center">
                                        @if($d->active==1)
                                        <span class="label label-success"><i class="fa fa-unlock"></i></span>
                                        @else <span class="label label-danger"><i class="fa fa-lock"></i></span>
                                        @endif
                                    </td>
                                    <td>
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
                                                @if($d->active==1)
                                                <li><a onclick="confirm('Are you sure you want to lock this account?')" href="{{url('admin/account/lock',['id'=>$d->id])}}">Lock</a></li>
                                                @else
                                                <li><a onclick="confirm('Are you sure you want to unLock this account?')" href="{{url('admin/account/unlock',['id'=>$d->id])}}">UnLock</a></li>
                                                @endif
                                                @if(session('adminSession')[0]['role']==3)
                                                <li><a onclick="confirm('Are you sure you want to Delete this account?')" href="{{url('admin/account/delete',['id'=>$d->id])}}">Delete</a></li>
                                                @endif
                                            </ul>

                                        </div>



                                    </td>
                                    <div id="my-modal{{$d->id}}" class="modal fade " tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content" style="border: 5px solid #00acd6">
                                                <div class="modal-header" style="border-bottom: 2px solid #00acd6">
                                                    <h3 class="modal-title text-center" style="font-weight: bold"  id="my-modal-title">ACCOUNT DETAIL</h3>
                                                    <button class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="box-body box-profile">
                                                        <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads')}}/{{$d->image}}" alt="User profile picture">
                                                        <h3 class="profile-username text-center">{{$d->fullname}}</h3>
                                                        <p class="text-muted text-center">Customer - <span>ID: {{$d->id}}</span></p>
                                                    </div>
                                                    <div class="box-body">
                                                        <strong><i class="fa fa-envelope margin-r-5"></i> ID</strong>
                                                        <p class="text-muted">{{$d->id}}</p>
                                                        <hr style="border-top: 1px solid #00acd6">
                                                        <strong><i class="fa fa-envelope margin-r-5"></i> Email</strong>
                                                        <p class="text-muted">{{$d->email}}</p>
                                                        <hr style="border-top: 1px solid #00acd6">
                                                        <strong><i class="fa fa-birthday-cake margin-r-5"></i> Date of birth</strong>
                                                        <p class="text-muted">{{$d->birthday}}</p>
                                                        <hr style="border-top: 1px solid #00acd6">
                                                        <strong><i class="fa fa-transgender margin-r-5"></i> Gender</strong>
                                                        <p class="text-muted">@if($d->gender==1) male @else female @endif</p>
                                                        <hr style="border-top: 1px solid #00acd6">
                                                        <strong><i class="fa fa-phone margin-r-5"></i> Phone</strong>
                                                        <p class="text-muted">{{$d->phone}}</p>
                                                        <hr style="border-top: 1px solid #00acd6">
                                                        <strong><i class="fa fa-hand-o-right margin-r-5"></i> Status</strong>
                                                        <p class="text-muted">@if($d->active==1) Active @else Lock @endif</p>
                                                        <hr style="border-top: 1px solid #00acd6">
                                                        <strong><i class="fa fa-hourglass-start margin-r-5"></i> Created at</strong>
                                                        <p class="text-muted">{{$d->created_at}}</p>
                                                        <hr style="border-top: 1px solid #00acd6">
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

            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
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
                        @if(Session::get('Success'))
                        <span style="font-size: 20px;">{{Session::get('Success')}}</span>
                        @endif
                        @if(Session::get('fail'))
                        <span style="font-size: 20px;">{{Session::get('fail')}}</span>
                        @endif

                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Summernote -->
<script src="{{asset('admin')}}/plugins/summernote/summernote-bs4.min.js"></script>
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>


    $(document).ready( function () {
        var t = $('#table_id').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 1, 'desc' ]]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
</script>

@endsection
