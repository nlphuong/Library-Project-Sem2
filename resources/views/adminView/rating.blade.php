@extends('layout.admin.index')
@section('main')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            COMMENT AND RATING BOOKS
          <small></small>
        </h1>
        <div class="row">
            <div class="col-sm-2">
                <form id="form1" action="">
                    @csrf
                    <select name="select" id="input" class="form-control" style="border-color: #1baa0ee6" required="required" onchange="submitChange()">
                        <option @if($status=='pending') selected @endif value="1">Pending</option>
                        <option   @if($status=='approved') selected @endif value="2">Approved</option>
                        <option  @if($status=='all') selected @endif  value="3">All</option>
                    </select>
                </form>

            </div>
        </div>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Comment and rating</li>
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
                        <table  class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr style="color: white;background-color: darkslategrey">
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Book</th>
                                    <th class="text-center">Status</th>
                                    <th >Comment</th>
                                    <th class="text-center">Rating</th>
                                    <th>Date time</th>
                                    <th style="width: 50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$d->account->email}}</td>
                                    <td>{{$d->book->title}}</td>
                                    <td class="text-center">
                                        @if($d->active==0)
                                        <span class="label label-warning">Pending</span>
                                        @elseif($d->active==1)
                                        <span class="label label-success">Approved</span>
                                        @else
                                        <span class="label label-danger">Denied</span>
                                        @endif
                                    </td>
                                    <td>{{$d->comment}}</td>
                                    <td class="text-center">{{$d->rating}}</td>
                                    <td>{{$d->create_at}}</td>
                                    <td>
                                        <div class="btn-group" style="display: inline-flex !important">
                                            <button type="button" class="btn btn-info">Action</button>
                                            <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                <span class="caret"></span>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <ul class="dropdown-menu" role="menu">

                                                @if($d->active==0 ||$d->active==2)
                                                <li><a  href="{{url('admin/approveRating?q=approve',['id'=>$d->id])}}">Approve</a></li>
                                                @endif
                                                @if($d->active != 2)
                                                <li><a  href="{{url('admin/approveRating?q=deny',['id'=>$d->id])}}">Deny</a></li>
                                                @endif
                                                @if(session('adminSession')[0]['role']==3)
                                                <li><a onclick="return confirm('Are you sure you want to Delete this account?')" href="{{url('admin/approveRating?q=delete',['id'=>$d->id])}}">Delete</a></li>
                                                @endif
                                            </ul>

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
@endsection
@section('js')
<script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
        var t = $('#table_id').DataTable( {
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0
            } ],
            "order": [[ 5, 'desc' ]]
        } );

        t.on( 'order.dt search.dt', function () {
            t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
                cell.innerHTML = i+1;
            } );
        } ).draw();
    } );
    function submitChange(){
        $('#form1').submit();
    }
</script>
@endsection
