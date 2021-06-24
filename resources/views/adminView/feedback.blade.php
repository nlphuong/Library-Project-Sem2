@extends('layout.admin.index')
@section('main')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
@endsection

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            CUSTOMER FEEDBACK
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th class="text-center">Subject</th>
                                    <th class="text-center">Message</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>{{$d->name}}</td>
                                    <td>{{$d->email}}</td>
                                    <td class="text-center">{{$d->phone}}</td>
                                    <td class="text-center">{{$d->subject}}</td>
                                    <td>{{$d->message}}</td>
                                    <td>{{$d->created_at}}</td>
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
         $('#table_id').DataTable({
            "order": [[ 5, "desc" ]]
         }
         );
    } );
</script>
@endsection
