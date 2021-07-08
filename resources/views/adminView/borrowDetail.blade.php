@extends('layout.admin.index')
@section('main')
@section('css')
    <link rel="stylesheet" href="{{asset('css')}}/admincss.css">
    <style>
        .table > tbody > tr > td {
            vertical-align: middle;
        }
    </style>
@endsection

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1 style="font-weight: bold; word-spacing: 3px; text-align: center">
            BORROW DETAIL
          <small></small>
        </h1>
        {{-- <ol class="breadcrumb">
            <li><a href="{{url('admin/index')}}"><i class="fa fa-home"></i> Home</a></li>
            <li class="active">Borrow books</li>
        </ol> --}}
    </section>

    <section class="invoice">

        <div class="row invoice-info">
          <div class="col-sm-4 invoice-col">
             <address>
                <h4><strong>Borrower</strong></h4>
                <hr>
                <strong> Name:</strong>
                <span style="padding-left: 5px">{{$data[0]->account->fullname}}</span> <br>
                <strong> Birth date:</strong>
                <span style="padding-left: 5px">{{$data[0]->account->birthday}}</span><br>
                <strong><i class="fa fa-map-marker margin-r-5"></i> Address:</strong>
                <span style="padding-left: 5px">{{$data[0]->account->address}}</span><br>
                <strong><i class="fa fa-phone margin-r-5"></i> Phone:</strong>
                <span style="padding-left: 5px">{{$data[0]->account->phone}}</span><br>
                <strong><i class="fa fa-envelope margin-r-5"></i> Email:</strong>
                <span style="padding-left: 5px">{{$data[0]->account->email}}</span><br>
             </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <address>
                    <h4><strong>Approved by</strong></h4>
                    <hr>
                    <strong> Name:</strong>
                    <span style="padding-left: 5px">{{session('adminSession')[0]['fullname']}}</span> <br>
                    <strong> Birth date:</strong>
                    <span style="padding-left: 5px">{{session('adminSession')[0]['birthday']}}</span><br>
                    <strong><i class="fa fa-map-marker margin-r-5"></i> Address:</strong>
                    <span style="padding-left: 5px">{{session('adminSession')[0]['address']}}</span><br>
                    <strong><i class="fa fa-phone margin-r-5"></i> Phone:</strong>
                    <span style="padding-left: 5px">{{session('adminSession')[0]['phone']}}</span><br>
                    <strong><i class="fa fa-envelope margin-r-5"></i> Email:</strong>
                    <span style="padding-left: 5px">{{session('adminSession')[0]['email']}}</span><br>
            </address>
          </div>
          <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <address>
                    <h4><strong><i class="fa fa-info"></i></strong></h4>
                    <hr>
                    <strong> Status:</strong>
                    <span style="padding-left: 5px" class="label label-warning">Pending</span><br>
                    <strong><i class="fa fa-hourglass-start margin-r-5"></i> Start date:</strong>
                    <span style="padding-left: 5px">{{date('d-m-Y',strtotime($data[0]->borrowed_From) )}}</span><br>
                    <strong><i class="fa fa-hourglass-end margin-r-5"></i> Expiration date:</strong>
                    <span style="padding-left: 5px">{{date('d-m-Y', strtotime('+7 days', strtotime($data[0]->borrowed_From)))}}</span><br>

            </address>
          </div>
          <!-- /.col -->

        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 ">
              <form action="" method="POST" >
                @csrf
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>ISBN</th>
                      <th style="width: 100px">Image</th>
                      <th>Title</th>
                      <th>No coppies current</th>
                      <th>Approve</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=1 ?>
                      @foreach ($data as $d)
                      <tr>
                          <td>{{$i++}}</td>
                          <td >{{$d->book->isbn}}</td>
                          <td><img src="{{asset('uploads/'.$d->book->image)}}" width="100%" alt=""></td>
                          <td>{{$d->book->title}}</td>
                          <td>{{$d->book->no_Copies_Current}}</td>
                          <td>
                              <div class="checkbox">
                                  <label>
                                      <input checked type="checkbox" name="borrow[]" value="{{$d->book->isbn}}">
                                  </label>
                              </div>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  @error('borrow')
                  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Nothing</strong> to approved!!
                </div>

                  @enderror
                  <input type="hidden" name="issued_by" value="{{session('adminSession')[0]['id']}}">
                  <button  type="submit" class="btn btn-success pull-right"><i class="fa fa-ship"></i> Approved
              </form>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->



        <!-- this row will not appear when printing -->
        {{-- <div class="row no-print">
          <div class="col-xs-12">

            <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
              <i class="fa fa-download"></i> Generate PDF
            </button>
          </div>
        </div> --}}
      </section>
@endsection
@section('js')
<script src="{{asset('js/footable.js')}}"></script>
<script src="{{asset('js/footable.min.js')}}"></script>
<script>
    jQuery(function($){
	$('#accordion-example-1,#accordion-example-2').footable();
});
</script>
@endsection
