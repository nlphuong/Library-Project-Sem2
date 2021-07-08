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
            EXPIRED BORROW DETAIL
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

          <!-- /.col -->
          {{-- <div class="col-sm-4 invoice-col">
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
          </div> --}}
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
                      <th>Expiration date</th>
                      <th>Price</th>
                      <th>Penalty fee (10%)</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; $money=0; ?>
                      @foreach ($data as $d)
                      <tr>
                          <td>{{$i++}}</td>
                          <td >{{$d->book->isbn}}</td>
                          <td><img src="{{asset('uploads/'.$d->book->image)}}" width="100%" alt=""></td>
                          <td>{{$d->book->title}}</td>
                          <td>{{$d->expiration_Date}}</td>
                          <td>${{$d->book->price}}</td>
                          <td>${{($d->book->price)*0.1}}</td>
                            <?php $money=$money +  ($d->book->price)*0.1?>
                            <input type="hidden" name="isbn[]" value="{{$d->book->isbn}}">
                          </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-xs-6">
                      <p class="lead">Payment Methods:</p>
                      <img src="{{asset('admin')}}/dist/img/credit/visa.png" alt="Visa">
                      <img src="{{asset('admin')}}/dist/img/credit/mastercard.png" alt="Mastercard">
                      <img src="{{asset('admin')}}/dist/img/credit/american-express.png" alt="American Express">
                      <img src="{{asset('admin')}}/dist/img/credit/paypal2.png" alt="Paypal">

                      <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                      </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-offset-2 col-xs-4">
                      <p class="lead">Amount Due <span>{{date('d/m/Y',strtotime(now()))}}</span></p>

                      <div class="table-responsive">
                        <table class="table">
                          <tbody><tr>
                            <th style="width:50%">SubTotal:</th>
                            <td>{{round($money,2)}}</td>
                          </tr>
                          <tr>
                              <th>Tax(10%)</th>
                              <td>{{round($money*0.1,2)}}</td>
                          </tr>
                          <tr>
                              <th>Total: </th>
                              <td>{{round($money*1.1,2)}}</td>
                          </tr>
                        </tbody></table>
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <input type="hidden" name="fee" value="{{round($money*1.1,2)}}">
                  <div class="col-xs-12">
                    <a href="{{url('admin/sendMail/'.$data[0]->customer_id.'/'.round($money*1.1,2))}}" target="_blank" class="btn btn-default"><i class="fa fa-envelope"></i> Send Email</a>
                    <button  type="submit" style="margin-right: 100px" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment</button>

                  </div>

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
