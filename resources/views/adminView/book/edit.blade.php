
@extends('layout.admin.index')
@section('css')
    <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('css')}}/admincss.css">

@endsection

 @section('main')
 {{--
@if(Session::has('createSuccess') || Session::has('createSuccess') )
<script>
    $(document).ready(function () {
        $('#modal-id').modal('show');
    });

</script>
@endif --}}
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
           EDIT BOOK
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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-primary">

                        <form action="{{route('book.update',$book->isbn)}}" class="form-horizontal" role="form" method="post">
                            @csrf
                            <div class="box-body">
                                <div class="form-group">
                                    <input type="hidden" value="PUT" name="_method"> <!-- Day du lieu bang phuong thuc put của laravel -->
                                    <div class="col-sm-offset-2 col-sm-4">
                                        <div class="form-group">
                                            <label for="isbn" class="col-sm-4 control-label">ISBN</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{$book->isbn}}" placeholder="ISBN" required name="isbn" disabled readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="title" class="col-sm-4 control-label">Title</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{$book->title}}"  placeholder="title" required name="title">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="author" class="col-sm-4 control-label">Author</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{$book->author}}" placeholder="author" name="author" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_pages" class="col-sm-4 control-label">Number of pages</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{$book->no_Pages}}"  name="no_Pages" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="publication_year" class="col-sm-4 control-label">Publication Year</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" value="{{$book->publication_Year}}" placeholder="publication_Year" name="publication_Year" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="publisher" class="col-sm-4 control-label">Publisher</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{$book->publisher}}"  name="publisher" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="price" class="col-sm-4 control-label">Price ($)</label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" value="{{$book->price}}" pattern="[0-9]+([\.][0-9]{0,2})?" title="This must be a number with up to 2 decimal places"  placeholder="price" name="price" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Category" class="col-sm-4 control-label">Category</label>
                                            <div class="col-sm-8">
                                                <select name="category_id" id="Category" class="form-control" required="required">
                                                    {{-- <option  selected value> -- select category book -- </option> --}}
                                                    @foreach($cats as $cat)
                                                    @if($cat->id==$book->category_Id)
                                                    <option selected  value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @else
                                                    <option  value="{{$cat->id}}">{{$cat->name}}</option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    {{-- sang--form-right --}}
                                    <div class="col-sm-4">

                                        <div class="form-group">
                                            <label for="no_coppies_actual" class="col-sm-4 control-label">No copies actual</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" value="{{$book->no_Copies_Actual}}"  name="no_Copies_Actual" required>
                                             </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_coppies_Current" class="col-sm-4 control-label">No copies Current</label>
                                            <div class="col-sm-8">
                                                <input type="number" class="form-control" value="{{$book->no_Copies_Current}}"  name="no_Copies_Current" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="position" class="col-sm-4 control-label">Position</label>
                                            <div class="col-sm-8">
                                                <div class="rows">
                                                    <div class="col-sm-3">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="position" id="input" value="A" checked="checked">A
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="position" id="input" value="B" >B
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="position" id="input" value="C">C
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="radio">
                                                            <label>
                                                                <input type="radio" name="position" id="input" value="D">D
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="image" class="col-sm-4 control-label">Image</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="image" onchange="loadImg()" value="{{$book->image}}" name="image" hidden>
                                                <button class="btn btn-success btn-sm" type="button" data-toggle="modal" data-target="#my-modal">Choose file</button>
                                                <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="width: 90%">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="my-modal-title">Upload file</h5>
                                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <iframe src="{{asset('filemanager')}}/dialog.php?field_id=image" style="width: 100%; height: 500px; overflow: auto;border: none" frameborder="0"></iframe>
                                                            </div>
                                                            <div class="modal-footer">
                                                                Footer
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center"><img id="show_img" src="{{asset('uploads')}}/{{$book->image}}" alt="" width="25%"></div>
                                    </div>
                                    <label for="" class="col-sm-offset-2 col-sm-8"><h3>Book content</h3></label>
                                    <div class="col-sm-offset-2 col-sm-8">
                                        <div class="form-group">
                                            <textarea id="content" name="content" >
                                                {{$book->content}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" onclick="confirm('Are you sure update? ')" class="btn btn-primary col-sm-offset-2">Update</button>
                                <a href="{{route('book.index')}}" type="button" class="btn btn-danger ">Cancel</a>

                            </div>
                        </form>
                        <!-- form start -->

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

                            @if(Session::has('createSuccess'))
                                {{Session::get('createSuccess')}}
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
<script>
     $('#content').summernote({
        placeholder: 'sangdz',

        height: 300
      });
     function loadImg(){
         $('#show_img').attr("src","{{asset('uploads')}}/"+$('#image').val());
     }
     $("#restart").click(function () {
        $(".check-icon").hide();
        setTimeout(function () {
            $(".check-icon").show();
        }, 10);
    });
</script>

@endsection
