@extends('layout.admin.index')
@section('main')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            MEMBERSHIP MANAGEMENT
          <small></small>
        </h1>
        <div class="row">
            <div class="col-sm-2">
                <form id="form1" action="">
                    @csrf
                    <select name="select" id="input" class="form-control" style="border-color: #1baa0ee6" required="required" onchange="submitChange()">
                        <option @if($status=='unpaid') selected @endif value="1">Unpaid</option>
                        <option   @if($status=='paid') selected @endif value="2">Paid</option>
                        <option  @if($status=='all') selected @endif  value="3">All</option>
                    </select>
                </form>

            </div>
        </div>
        <ol class="breadcrumb">
            <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Membership</li>
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
                                    <th>Start Date</th>
                                    <th>Expiration Date</th>
                                    <th class="text-center">Status</th>
                                    <th>Register Date</th>
                                    <th style="width: 50px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0; ?>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$d->account->email}}</td>
                                    <td>{{$d->start_date}}</td>
                                    <td>{{$d->expiration_Date}}</td>
                                    <td class="text-center">
                                        @if($d->status==1)
                                        <span class="label label-warning">Unpaid</span>
                                        @elseif($d->status==2)
                                        <span class="label label-success">Paid</span>
                                        @else
                                        <span class="label label-danger">Expired</span>
                                        @endif
                                    </td>
                                    <td>{{$d->updated_at}}</td>
                                    <td>
                                        @if($d->status==1)
                                        <a href="{{url('admin/approvedMember/'.$d->id)}}" class="btn btn-success">Approved</a>
                                        @endif
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
