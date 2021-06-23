
@extends('layout.admin.index')
@section('css')
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/summernote/summernote-bs4.min.css">
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
            LIST BOOK
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

                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Price</th>
                                    <th>Date Update</th>
                                    <th class="text-center" style="width: 100px">Image</th>
                                    <th class="text-center">Position</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=0?>
                                @foreach($data as $d)
                                <tr>

                                    <td>{{$d->isbn}}</td>
                                    <td>{{$d->title}}</td>
                                    <td>{{$d->cat->name}}</td>
                                    <td class="text-center">{{$d->no_Copies_Current}}</td>
                                    <td class="text-center">{{$d->price}}</td>
                                    <td>{{$d->updated_at}}</td>
                                    <td class="text-center"><img src="{{asset('uploads')}}/{{$d->image}}" alt="" width="100%"></td>
                                    <td class="text-center">{{$d->position}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a data-toggle="dropdown" class="btn btn-default btn-lg " href="">Action <span class="caret"></span></a>
                                            <ul class="dropdown-menu " style="font-size: 20px">
                                                <li><a  href="{{route('book.edit',$d->isbn)}}">Edit</a></li>
                                                <li>
                                                    <form id="my_form{{$d->isbn}}" action="{{route('book.destroy',$d->isbn)}}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="Delete" name="_method">
                                                        <button style="border: none;background:none" class="dropdown-fix" onclick="confirm('Are you sure you want to delete?')" type="submit">Delete</button>
                                                    </form>
                                                </li>
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
