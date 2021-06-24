
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
         {{-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Blank page</li>
        </ol> --}}
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
                                <tr style="color: white;background-color: cadetblue">
                                    <th>ID</th>
                                    <th>Fullname</th>
                                    <th>Email</th>
                                    <th class="text-center">Gender</th>
                                    <th class="text-center">Address</th>
                                    <th>Day of birth</th>
                                    <th class="text-center" style="width: 100px">Phone</th>
                                    <th class="text-center">Status</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->id}}</td>
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
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" class="btn btn-default btn-lg " href="">Action <span class="caret"></span></a>
                                            <ul class="dropdown-menu " style="font-size: 20px">

                                                <li>
                                                    <button style="border: none;background:none" class="dropdown-fix" type="button" data-toggle="modal" data-target="#my-modal{{$d->id}}">Detail</button>
                                                </li>
                                                @if($d->active==1)
                                                <li><a onclick="confirm('Are you sure you want to lock this account?')" href="{{url('admin/account/lock',['id'=>$d->id])}}">Lock</a></li>
                                                @else
                                                <li><a onclick="confirm('Are you sure you want to unLock this account?')" href="{{url('admin/account/unlock',['id'=>$d->id])}}">UnLock</a></li>
                                                @endif
                                            </ul>
                                            <div id="my-modal{{$d->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title text-center" style="font-weight: bold"  id="my-modal-title">ACCOUNT DETAIL</h3>
                                                            <button class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="box-body box-profile">
                                                                <img class="profile-user-img img-responsive img-circle" src="{{asset('uploads')}}/{{$d->image}}" alt="User profile picture">
                                                                <h3 class="profile-username text-center">{{$d->fullname}}</h3>
                                                                <p class="text-muted text-center">Customer</p>
                                                            </div>
                                                            <div class="box-body">
                                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Email</strong>
                                                                <p class="text-muted">{{$d->email}}</p>
                                                                <hr>
                                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Date of birth</strong>
                                                                <p class="text-muted">{{$d->birthday}}</p>
                                                                <hr>
                                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Gender</strong>
                                                                <p class="text-muted">@if($d->gender==1) male @else female @endif</p>
                                                                <hr>
                                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Phone</strong>
                                                                <p class="text-muted">{{$d->phone}}</p>
                                                                <hr>
                                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Status</strong>
                                                                <p class="text-muted">@if($d->active==1) Active @else Lock @endif</p>
                                                                <hr>
                                                                <strong><i class="fa fa-map-marker margin-r-5"></i> Created at</strong>
                                                                <p class="text-muted">{{$d->created_at}}</p>
                                                                <hr>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

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
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 style="font-weight: bold" class="modal-title">Message</h3>
                </div>
                <div class="modal-body">
                    <div class="success-checkmark">
                        <div class="check-icon">
                          <span class="icon-line line-tip"></span>
                          <span class="icon-line line-long"></span>
                          <div class="icon-circle"></div>
                          <div class="icon-fix"></div>
                        </div>
                    </div>

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>

                            @if(Session::has('Success'))
                                {{Session::get('Success')}}
                            @endif

                        </strong>
                    </div>

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
         $('#table_id').DataTable({
            "order": [[ 5, "desc" ]]
         }

         );
    } );
</script>

@endsection
