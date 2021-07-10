@extends('layout.admin.index')
@section('main')
<section class="content-header">
    <h1>
      Dashboard
      <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$data1['countBorrow']}}</h3>

              <p>New Borrow</p>
            </div>
            <div class="icon">
              <i class="fa fa-sticky-note"></i>
            </div>
            <a href="{{url('admin/borrow')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{round($data1['sumMemberFee']+$data1['sumPenaFee'],2)}}<sup style="font-size: 20px">$</sup></h3>

              <p>Revenue</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$data1['sumCustomer']}}</h3>

              <p>Customer Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{url('admin/account/customer')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>{{$data1['countExpired']}}</h3>

              <p>Expired Borrow</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{url('admin/borrow')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="col-md-12">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Monthly Recap Report</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-wrench"></i></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row">
              <div class="col-md-8">
                <p class="text-center">
                  <strong>Borrow: {{now()->subDay(6)->format('d-m-Y'). '- '.now()->format('d-m-Y')}}</strong>
                </p>

                <div class="chart">
                  <!-- Sales Chart Canvas -->
                  {{-- <canvas id="salesChart" style="height: 113px; width: 677px;" width="677" height="113"></canvas> --}}
                  {{-- <div class="chart tab-pane active" id="revenue-chart" ></div> --}}
                  <canvas id="lineChart" style="height:250px"></canvas>
                </div>
                <!-- /.chart-responsive -->
              </div>
              <!-- /.col -->
              <div class="col-md-4">
                <p class="text-center">
                  <strong>Most Borrowed Books </strong>
                </p>
                <?php $i=1 ?>
                @foreach ($data1['mostBorrowBook'] as $item)
                <div class="progress-group">
                    <span class="progress-text">{{$i++.'/'.$item->book->title}}</span>
                    {{-- <span class="progress-number"><b>160</b>/200</span> --}}

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-aqua" style="width: 100%"></div>
                    </div>
                </div>
                @endforeach

                <!-- /.progress-group -->

              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- ./box-body -->
          <div class="box-footer">
            <div class="row">
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-green"> {{now()->format('M').'-'.now()->format('Y')}}</span>
                  <h5 class="description-header">${{round($data1['sum1']+$data1['sum2'],2)}}</h5>
                  <span class="description-text">TOTAL REVENUE</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-yellow">{{now()->format('M').'-'.now()->format('Y')}}</span>
                  <h5 class="description-header">${{round($data1['sum1'],2)}}</h5>
                  <span class="description-text">TOTAL MEMBESHIP FEE</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-green">{{now()->format('M').'-'.now()->format('Y')}}</span>
                  <h5 class="description-header">${{round($data1['sum2'],2)}}</h5>
                  <span class="description-text">TOTAL PENALTY FEE</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-3 col-xs-6">
                <div class="description-block">
                  <span class="description-percentage text-red">{{now()->format('M').'-'.now()->format('Y')}}</span>
                  <h5 class="description-header">{{$data1['countBorrowMonth']}}</h5>
                  <span class="description-text">TOTAL BORROW</span>
                </div>
                <!-- /.description-block -->
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /.box -->
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Borrows</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                      <tr>
                        <th>No</th>
                        <th>Email</th>
                        <th>Book Title</th>
                        <th >Status</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php $i=1;?>
                        @foreach ($data1['lastBorrow'] as $item)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->account->email}}</td>
                            <td>{{$item->book->title}}</td>
                            <td>
                                @if($item->status==2)
                                <span class="label label-success">Approved</span>
                                @elseif($item->status==1)
                               <span class="label label-warning">Pending</span>
                                @elseif($item->status==3)
                                <span class="label label-info">Returned</span>
                                @elseif($item->status==4)
                               <span class="label label-danger">Expired</span>
                                @endif
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">

                  <a href="{{url('admin/borrow')}}" class="btn btn-sm btn-default btn-flat pull-right">View All Borrows</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Customers who borrow books the most in {{now()->format('m/Y')}}</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach ($data1['mostMember'] as $item)
                    <li>
                      <img src="{{asset('uploads')}}/{{$item->account->image}}" alt="User Image">
                      <a class="users-list-name" href="#">{{$item->account->fullname.' ID: '.$item->account->id}}</a>
                      <span class="users-list-date" style="color: seagreen"><i class="fa fa-exchange" style="padding-right: 15px"></i> {{'Number of borrowed: '.$item->count}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="{{url('admin/account/customer')}}" class="uppercase">View All Users</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>
        <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                    <?php $width= $data1['minNoBook'][0]->no_Copies_Current/$data1['minNoBook'][0]->no_Copies_Actual?>
                  <span class="info-box-text">{{$data1['minNoBook'][0]->title}}</span>
                  <span class="info-box-number">{{round($width*100,0)}}%</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: {{$width}}"></div>
                  </div>
                  <span class="progress-description">
                        {{'Remaining '.$data1['minNoBook'][0]->no_Copies_Current .' out of '. $data1['minNoBook'][0]->no_Copies_Actual}}
                      </span>
                </div>
                <!-- /.info-box-content -->
            </div>
              <!-- /.info-box -->
            <div class="info-box bg-yellow">
              <span class="info-box-icon"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <?php $width= $data1['minNoBook'][1]->no_Copies_Current/$data1['minNoBook'][1]->no_Copies_Actual?>
                <span class="info-box-text">{{$data1['minNoBook'][1]->title}}</span>
                <span class="info-box-number">{{round($width*100,0)}}%</span>

                <div class="progress">
                  <div class="progress-bar" style="width: {{$width}}"></div>
                </div>
                <span class="progress-description">
                    {{'Remaining '.$data1['minNoBook'][1]->no_Copies_Current .' out of '. $data1['minNoBook'][1]->no_Copies_Actual}}
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-book"></i></span>

                <div class="info-box-content">
                    <?php $width= $data1['minNoBook'][2]->no_Copies_Current/$data1['minNoBook'][2]->no_Copies_Actual?>
                  <span class="info-box-text">{{$data1['minNoBook'][2]->title}}</span>
                  <span class="info-box-number">{{round($width*100,0)}}%</span>

                  <div class="progress">
                    <div class="progress-bar" style="width: {{$width}}"></div>
                  </div>
                  <span class="progress-description">
                    {{'Remaining '.$data1['minNoBook'][2]->no_Copies_Current .' out of '. $data1['minNoBook'][2]->no_Copies_Actual}}
                      </span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box bg-green">
              <span class="info-box-icon"><i class="fa fa-book"></i></span>

              <div class="info-box-content">
                <?php $width= $data1['minNoBook'][3]->no_Copies_Current/$data1['minNoBook'][3]->no_Copies_Actual?>
                <span class="info-box-text">{{$data1['minNoBook'][3]->title}}</span>
                <span class="info-box-number">{{round($width*100,0)}}%</span>

                <div class="progress">
                  <div class="progress-bar" style="width: {{$width}}"></div>
                </div>
                <span class="progress-description">
                    {{'Remaining '.$data1['minNoBook'][3]->no_Copies_Current .' out of '. $data1['minNoBook'][3]->no_Copies_Actual}}
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->



            {{-- <div class="box box-default">
              <div class="box-header with-border">
                <h3 class="box-title">Browser Usage</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body" style="">
                <div class="row">
                  <div class="col-md-8">
                    <div class="chart-responsive">
                      <canvas id="pieChart" height="170" width="197" style="width: 197px; height: 170px;"></canvas>
                    </div>
                    <!-- ./chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <ul class="chart-legend clearfix">
                      <li><i class="fa fa-circle-o text-red"></i> Chrome</li>
                      <li><i class="fa fa-circle-o text-green"></i> IE</li>
                      <li><i class="fa fa-circle-o text-yellow"></i> FireFox</li>
                      <li><i class="fa fa-circle-o text-aqua"></i> Safari</li>
                      <li><i class="fa fa-circle-o text-light-blue"></i> Opera</li>
                      <li><i class="fa fa-circle-o text-gray"></i> Navigator</li>
                    </ul>
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer no-padding" style="">
                <ul class="nav nav-pills nav-stacked">
                  <li><a href="#">United States of America
                    <span class="pull-right text-red"><i class="fa fa-angle-down"></i> 12%</span></a></li>
                  <li><a href="#">India <span class="pull-right text-green"><i class="fa fa-angle-up"></i> 4%</span></a>
                  </li>
                  <li><a href="#">China
                    <span class="pull-right text-yellow"><i class="fa fa-angle-left"></i> 0%</span></a></li>
                </ul>
              </div>
              <!-- /.footer -->
            </div> --}}
            <!-- /.box -->


        </div>
    </div>
</section>
@section('js')
<script>
    $(function () {
      /* ChartJS
       * -------
       * Here we will create a few charts using ChartJS
       */

      //--------------
      //- AREA CHART -
      //--------------

      // Get context with jQuery - using jQuery's .get() method.
      // var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
      // This will get the first returned node in the jQuery collection.
      // var areaChart       = new Chart(areaChartCanvas)
      var dates = {!! json_encode($data1['date']) !!};
      console.log(Object.values(dates)[0]);
      var areaChartData = {
        labels  : [Object.keys(dates)[0], Object.keys(dates)[1], Object.keys(dates)[2], Object.keys(dates)[3], Object.keys(dates)[4], Object.keys(dates)[5], 'today'],
        datasets: [

          {
            label               : 'Digital Goods',
            fillColor           : 'rgba(60,141,188,0.9)',
            strokeColor         : 'rgba(60,141,188,0.8)',
            pointColor          : '#3b8bba',
            pointStrokeColor    : 'rgba(60,141,188,1)',
            pointHighlightFill  : '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data                : [Object.values(dates)[0], Object.values(dates)[1], Object.values(dates)[2], Object.values(dates)[3], Object.values(dates)[4], Object.values(dates)[5], Object.values(dates)[6]]
          }
        ]
      }

      var areaChartOptions = {
        //Boolean - If we should show the scale at all
        showScale               : true,
        //Boolean - Whether grid lines are shown across the chart
        scaleShowGridLines      : false,
        //String - Colour of the grid lines
        scaleGridLineColor      : 'rgba(0,0,0,.05)',
        //Number - Width of the grid lines
        scaleGridLineWidth      : 1,
        //Boolean - Whether to show horizontal lines (except X axis)
        scaleShowHorizontalLines: true,
        //Boolean - Whether to show vertical lines (except Y axis)
        scaleShowVerticalLines  : true,
        //Boolean - Whether the line is curved between points
        bezierCurve             : true,
        //Number - Tension of the bezier curve between points
        bezierCurveTension      : 0.3,
        //Boolean - Whether to show a dot for each point
        pointDot                : false,
        //Number - Radius of each point dot in pixels
        pointDotRadius          : 4,
        //Number - Pixel width of point dot stroke
        pointDotStrokeWidth     : 1,
        //Number - amount extra to add to the radius to cater for hit detection outside the drawn point
        pointHitDetectionRadius : 20,
        //Boolean - Whether to show a stroke for datasets
        datasetStroke           : true,
        //Number - Pixel width of dataset stroke
        datasetStrokeWidth      : 2,
        //Boolean - Whether to fill the dataset with a color
        datasetFill             : true,
        //String - A legend template
        legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
        //Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio     : true,
        //Boolean - whether to make the chart responsive to window resizing
        responsive              : true
      }

      //Create the line chart
      // areaChart.Line(areaChartData, areaChartOptions)

      //-------------
      //- LINE CHART -
      //--------------
      var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
      var lineChart                = new Chart(lineChartCanvas)
      var lineChartOptions         = areaChartOptions
      lineChartOptions.datasetFill = false
      lineChart.Line(areaChartData, lineChartOptions)

      //-------------
      //- PIE CHART -
      //-------------
      // Get context with jQuery - using jQuery's .get() method.
      var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
      var pieChart       = new Chart(pieChartCanvas)
      var PieData        = [
        {
          value    : 1,
          color    : '#f56954',
          highlight: '#f56954',
          label    : 'Chrome'
        },
        {
          value    : 2,
          color    : '#00a65a',
          highlight: '#00a65a',
          label    : 'IE'
        },
        {
          value    : 0,
          color    : '#f39c12',
          highlight: '#f39c12',
          label    : 'FireFox'
        },
        {
          value    : 3,
          color    : '#00c0ef',
          highlight: '#00c0ef',
          label    : 'Safari'
        },
        {
          value    : 1,
          color    : '#3c8dbc',
          highlight: '#3c8dbc',
          label    : 'Opera'
        },
        {
          value    : 2,
          color    : '#d2d6de',
          highlight: '#d2d6de',
          label    : 'Navigator'
        }
      ]
      var pieOptions     = {
        //Boolean - Whether we should show a stroke on each segment
        segmentShowStroke    : true,
        //String - The colour of each segment stroke
        segmentStrokeColor   : '#fff',
        //Number - The width of each segment stroke
        segmentStrokeWidth   : 2,
        //Number - The percentage of the chart that we cut out of the middle
        percentageInnerCutout: 50, // This is 0 for Pie charts
        //Number - Amount of animation steps
        animationSteps       : 100,
        //String - Animation easing effect
        animationEasing      : 'easeOutBounce',
        //Boolean - Whether we animate the rotation of the Doughnut
        animateRotate        : true,
        //Boolean - Whether we animate scaling the Doughnut from the centre
        animateScale         : false,
        //Boolean - whether to make the chart responsive to window resizing
        responsive           : true,
        // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
        maintainAspectRatio  : true,
        //String - A legend template
        legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      pieChart.Doughnut(PieData, pieOptions)

      //-------------
    })
  </script>
@endsection
@endsection
