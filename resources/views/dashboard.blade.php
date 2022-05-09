@extends('layouts.app', ['title' => __('Dashboard')])



@section('content')

    @include('layouts.headers.cards')



    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-4">

                <div class="card shadow">

                    <div class="card-header bg-transparent">

                        <div class="row align-items-center">

                            <div class="col-xl-8">

                                <h6 class="text-uppercase text-muted ls-1 mb-1"></h6>

                                <h2 class="mb-0">{{ __('Top Rated Girls') }}</h2>

                            </div>

                            <div class="col-xl-4">

                                <a href="{{url('girls')}}">View All</a>

                            </div>

                        </div>

                    </div>

                    <div class="card-body" style="max-height: 600px;overflow-y: scroll;">

                        <div class="row">

                            @if(!$top_girls->isEmpty())

                                @foreach($top_girls as $key => $girls)

                                    <!--<div class="col-lg-2">

                                        {{$key+1}}

                                    </div>-->

                                    @php 

                                        $img = explode(',',$girls->image);

                                    @endphp

                                    <div class="col-lg-3">

                                        <img src="{{url('uploads/girls').'/'.$img[0]}}" width="50" height="50">

                                    </div>

                                    <div class="col-lg-9">

                                        <h3 >{{$girls->full_name}}</h3>

                                        <p>{{ App\Helpers\Helper::cityName($girls->city_id)}}</p>

                                    </div>

                                @endforeach

                            @endif

                        </div>

                    </div>

                </div>

            </div>

            <div class="col-xl-8 mb-5 mb-xl-0">

                <div class="card bg-gradient-default shadow">

                    <!-- <div class="card-header bg-transparent">

                        <div class="row align-items-center">

                            <div class="col">

                                <h6 class="text-uppercase text-light ls-1 mb-1">{{ __('Overview') }}</h6>

                                <h2 class="text-white mb-0">{{ __('Sales value') }}</h2>

                            </div>



                        </div>

                    </div> -->

                    <!-- <script>

                        //var months = ['Jan', 'Feb', 'Mar', 'Apr', 'May','Jun', 'Jul', 'Aug', 'Sep','Oct', 'Nov', 'Dec'];

                        // var months = {!! json_encode($months) !!};

                        // function monthNumToName(monthnum) {return months[monthnum - 1] || ''}



                        // var monthLabels = {!! json_encode($monthLabels) !!};

                        // var salesValue= {!! json_encode($salesValue) !!};

                        // var totalOrders = {!! json_encode($totalOrders) !!};



                        // for(var i=0; i<monthLabels.length; i++){monthLabels[i]=monthNumToName(monthLabels[i])}

                    </script> -->

                    <div class="card-body">

                        <div id="columnchart_values" style="width: 900px; height: 300px;"></div>

                        <!-- Chart -->

                        <!-- @//if(!$salesValue->isEmpty()) -->

                            <div class="chart">

                                <!-- Chart wrapper -->

                                <canvas id="chart-sales" class="chart-canvas"></canvas>

                            </div>

                        <!-- @//else -->

                            <!-- <p class="text-white">{{ __('No sales right now!') }}</p> -->

                        <!-- @//endif -->

                    </div>

                </div>

            </div>

            

        </div>





        @include('layouts.footers.auth')

    </div>

@endsection



@push('js')

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>

    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">

    google.charts.load("current", {packages:['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = google.visualization.arrayToDataTable([

        ['Year', 'Visitations', { role: 'style' } ],

        ['2010', 10, 'color: #ec297b'],

        ['2020', 14, 'color: #ec297b'],

        ['2030', 16, 'color: #ec297b'],

        ['2040', 22, 'color: #ec297b'],

        ['2050', 28, 'stroke-color: #871B47; stroke-opacity: 0.6; stroke-width: 8; fill-color: #BC5679; fill-opacity: 0.2']

      ]);



      var view = new google.visualization.DataView(data);

      view.setColumns([0, 1,

                       { calc: "stringify",

                         sourceColumn: 1,

                         type: "string",

                         role: "annotation" },

                       2]);



      var options = {

        title: "Monthly Income Chart",

        chartArea:{left:50,top:30,bottom:30,width:"100%",height:"100%"},

        titleTextStyle: {

                color: "#fff",               // color 'red' or '#cc00cc'

                fontSize: 25,               // 12, 18

                bold: true,                 // true or false

            },

        width:780,

        height: 500,

        backgroundColor: '#2e2b50',

        bar: {groupWidth: "50%"},

        legend: { position: "none" },

        hAxis: {textStyle:{color: '#FFF'} },

        vAxis: {textStyle:{color: '#FFF'} }

      };

      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));

      chart.draw(view, options);

  }

  </script>

@endpush

