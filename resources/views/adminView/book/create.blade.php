
@extends('layout.admin.index')
@section('css')
    <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin')}}/plugins/summernote/summernote-bs4.min.css">
  <link rel="stylesheet" href="{{asset('css')}}/admincss.css">

@endsection

@section('main')
@if(Session::has('createSuccess') )
<script>
    $(document).ready(function () {
        $('#modal-id').modal('show');
    });

</script>
@endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            ADD NEW BOOK
          <small></small>
        </h1>
         <ol class="breadcrumb">
          <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
          <li><a >Book</a></li>
          <li class="active">Create book</li>
        </ol>
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

                        <form action="{{route('book.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">
                              <div class="col-sm-offset-2 col-sm-4">
                                <div class="form-group">
                                  <label for="isbn" class="col-sm-4 control-label">ISBN</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="isbn" placeholder="ISBN" required name="isbn" value="{{old('isbn')}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="title" class="col-sm-4 control-label">Title</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="title" placeholder="title" required name="title" value="{{old('title')}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="author" class="col-sm-4 control-label">Author</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="author" placeholder="author" name="author" required value="{{old('author')}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="no_pages" class="col-sm-4 control-label">Number of pages</label>
                                  <div class="col-sm-8">
                                    <input type="number" class="form-control" id="no_pages" placeholder="Number of pages" name="no_Pages" required value="{{old('no_Pages')}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="publication_year" class="col-sm-4 control-label">Publication Year</label>
                                  <div class="col-sm-8">
                                    <input type="number" class="form-control" id="publication_year" placeholder="publication_year" name="publication_Year" required value="{{old('publication_Year')}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="publisher" class="col-sm-4 control-label">Publisher</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" id="publisher" placeholder="Publisher" name="publisher" required value="{{old('publisher')}}">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="price" class="col-sm-4 control-label">Price ($)</label>
                                  <div class="col-sm-8">
                                    <input type="text" class="form-control" pattern="[0-9]+([\.][0-9]{0,2})?" title="This must be a number with up to 2 decimal places" id="price" placeholder="price" name="price" required value="{{old('price')}}">
                                  </div>
                                </div>


                              </div>
                              {{-- sang--form-right --}}
                              <div class="col-sm-4">
                                <div class="form-group">
                                  <label for="Category" class="col-sm-4 control-label">Category</label>
                                  <div class="col-sm-8">
                                    <select name="category_id" id="Category" class="form-control" required="required">
                                        <option disabled selected value> -- select category book -- </option>
                                        @foreach($cats as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <label for="no_coppies_actual" class="col-sm-4 control-label">Quantity</label>
                                    <div class="col-sm-8">
                                      <input type="number" class="form-control" id="no_coppies_actual"  name="no_Copies_Actual" required value="{{old('no_Copies_Actual')}}">
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
                                        <input type="text" id="image" onchange="loadImg()" name="image" hidden value="{{old('image')}}">
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
                                <div class="text-center"><img id="show_img"  alt="" width="25%"></div>
                              </div>
                              <label for="" class="col-sm-offset-2 col-sm-8"><h3>Book content</h3></label>
                              <div class="col-sm-offset-2 col-sm-8">
                                <div class="form-group">
                                    <textarea id="content" name="content">
                                        {{old('content')}}
                                    </textarea>
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                            <button type="submit" class="btn btn-info col-sm-offset-2">Create</button>

                            <button type="reset" class="btn btn-default ">Reset</button>
                            <a href="{{route('book.index')}}" class="btn btn-danger ">Cancel</a>

                            </div>
                            <!-- /.box-footer -->
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
        placeholder: 'Description book',

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
