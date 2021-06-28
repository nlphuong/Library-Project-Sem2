@extends('layout.admin.index')
@section('main')
{{-- @if(Session::has('createSuccess'))
    <script>alert('{{Session::get("createSuccess")}}')</script>
@endif
@if(Session::has('createFail'))
    <script>alert('{{Session::get("createFail")}}')</script>
@endif
--}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          Categories
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
                {{--sang--- create category modal --}}
                <a class="btn btn-lg btn-primary" data-toggle="modal" href='#modal-id'>New Category</a>
                <div class="modal fade" id="modal-id">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">Create new category</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('category.store')}}" role="form" enctype="multipart/form-data" method="post">
                                    @csrf
                                  <div class="box-body">
                                    <div class="form-group">
                                      <label for="catname">Category Name</label>
                                      <input type="text" class="form-control" id="catname" placeholder="Enter name" name="name" required>
                                      @error('name')
                                        <div style="color: red">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                    </div>
                                    <div class="form-group">
                                      <label for="upload">Image</label>
                                      <input type="file" name="upload" id="upload" onchange="readURL(this);" required>
                                      <img id="blah" src="#" hidden />
                                      @error('upload')
                                        <div style="color: red">
                                            {{ $message }}
                                        </div>
                                      @enderror
                                    </div>

                                  </div>
                                  <!-- /.box-body -->

                                  <div class="box-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create</button>

                                  </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                 {{--sang--- end create category modal --}}
            </div>
            {{--sang--- start list category modal --}}
            <div class="box-body">
                <h2 style=" font-weight: bold">CATEGORIES LIST</h2>
                <hr>

                <div class="row" >
                    @foreach($cats as $cat)
                    <div class=" col-md-6 col-lg-4">
                        <div class="thumbnail text-center">
                            <img data-src="#" alt="">
                            <div class="caption">
                                <h3 style="font-weight: 500">{{$cat->name}}</h3>
                                <p>
                                   <img width="90%" height="200px" src="{{asset('uploads/'.$cat->image)}}" alt="">
                                </p>
                                <span >
                                    <a class="btn btn-success" title="Edit"  data-toggle="modal" href='#edit{{$cat->id}}'><i class="glyphicon glyphicon-edit"></i></a>
                                    <div class="modal fade" id="edit{{$cat->id}}">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h2 class="modal-title" style="font-weight: bold">Edit Category</h2>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('category.update',$cat->id)}}" role="form" enctype="multipart/form-data" method="post">
                                                        @csrf
                                                      <div class="box-body">
                                                        <div class="form-group">
                                                            <input type="hidden" value="PUT" name="_method"> <!-- Day du lieu bang phuong thuc put của laravel -->
                                                          <label >Category Name</label>
                                                          <input type="text" class="form-control"  value="{{$cat->name}}" name="name" required>
                                                          @error('name')
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                          @enderror
                                                        </div>
                                                        <div class="form-group">
                                                          <label for="upload">Image</label>
                                                          <input type="file" class="upload" name="upload"  onchange="document.getElementById('blah{{$cat->id}}').src = window.URL.createObjectURL(this.files[0]);">
                                                          @error('upload')
                                                            <div class="alert alert-danger">
                                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                                                <strong>{{ $message }}</strong>
                                                            </div>
                                                          @enderror

                                                          <img id="blah{{$cat->id}}"/>


                                                        </div>

                                                      </div>
                                                      <!-- /.box-body -->

                                                      <div class="box-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" onclick="confirm('Are you sure update? ')" class="btn btn-primary">Update</button>

                                                      </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a class="btn btn-danger" title="Delete" href="{{url('admin/category/delete/'.$cat->id)}}"><i class="glyphicon glyphicon-trash"></i></a>

                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>


            </div>
            {{--sang--- end list category modal --}}

            <!-- /.box-body -->
        </div>


        <!-- /.box -->

    </section>
    <!-- /.content -->

    {{-- sang --kiem tra validate create category, neu loi => bat modal --}}
    @if(Session::has('errors'))
        <script>
            $(document).ready(function () {
                $('#modal-id').modal('show');
            });
        </script>
    @endif

    {{-- sang-- hien thi anh sau khi choose file --}}
    <script>
        function readURL(input) {

            $('#blah').show();
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
@endsection
