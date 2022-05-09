@extends('layouts.app', ['title' => __('Cash In Hand')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        @if(count($drivers))
                            <form method="GET" action="{{ route('drivers.index') }}">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">{{ __('Cash In Hand') }}</h3>
                                    </div>
                                </div>
                                <br/>
                                <div class="tab-content drivers-filters">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-daterange datepicker row align-items-center">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">{{ __('Filter by Date From') }}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input name="fromDate" class="form-control" placeholder="{{ __('Date from') }}" type="text" <?php if(isset($_GET['fromDate'])){echo 'value="'.$_GET['fromDate'].'"';} ?> >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="form-control-label">{{ __('To') }}</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                            </div>
                                                            <input name="toDate" class="form-control" placeholder="{{ __('Date to') }}" type="text"  <?php if(isset($_GET['toDate'])){echo 'value="'.$_GET['toDate'].'"';} ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @hasrole('admin|owner')
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="driver">{{ __('Filter by Driver') }}</label>
                                                <select class="form-control select2" name="driver_id">
                                                    <option disabled selected value> -- {{ __('Select an option') }} -- </option>
                                                    @foreach ($drivers as $driver)
                                                        <option <?php if(isset($_GET['driver_id'])&&$_GET['driver_id'].""==$driver->id.""){echo "selected";} ?>   value="{{ $driver->id }}">{{$driver->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endhasrole
                                    </div>
                                    <div class="col-md-6 offset-md-6">
                                        <div class="row">
                                            @if ($parameters)
                                                <div class="col-md-4">
                                                    <a href="{{ route('drivers.index') }}" class="btn btn-md btn-block">{{ __('Clear Filters') }}</a>
                                                </div>
                                                <div class="col-md-4">
                                                <a href="{{Request::fullUrl()."&report=true" }}" class="btn btn-md btn-success btn-block">{{ __('Download report') }}</a>
                                                </div>
                                            @else
                                                <div class="col-md-8"></div>
                                            @endif

                                            <div class="col-md-4">
                                                <button type="submit" class="btn btn-primary btn-md btn-block">{{ __('Filter') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    @if(count($drivers))
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('SN') }}</th>
                                    <th class="table-web" scope="col">{{ __('Driver Name') }}</th>
                                    <th class="table-web" scope="col">{{ __('Total Order') }}</th>
                                    <th class="table-web" scope="col">{{ __('Orders Id') }}</th>
                                    <th class="table-web" scope="col">{{ __('Cash In Hand') }}</th>
                                    <th class="table-web" scope="col">{{ __('Total Commission') }}</th>                                    
                                    <th class="table-web" scope="col">{{ __('Total Value') }}</th>                                    
                                    <th class="table-web" scope="col">{{ __('Total KM') }}</th>                                    
                                    <th class="table-web" scope="col">{{ __('Action') }}</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sn = 1; ?>
                                @if($drivers)
                                    @foreach($drivers as $res)
                                        <?php
                                            $totalOrders = DB::table("orders")->where('settlement_status','=',1)->where('order_status','=','completed')->where('driver_id','=',$res->user_id)->count();
                                            $totalCommission = DB::table("orders")->where('settlement_status','=',1)->where('order_status','=','completed')->where('driver_id','=',$res->user_id)->sum("driver_commission");
                                            $totalCashInHand = DB::table("orders")->where('settlement_status','=',0)->where('order_status','=','completed')->where('driver_id','=',$res->user_id)->sum("total_price");
                                            $totalSettlement = DB::table("orders")->where('settlement_status','=',1)->where('order_status','=','completed')->where('driver_id','=',$res->user_id)->sum("total_price");
                                            $totalKM = DB::table("orders")->where('order_status','=','completed')->where('driver_id','=',$res->user_id)->sum("distance_restorent_customer");
                                        ?>
                                        <tr>
                                            <td>
                                                <a class="btn badge badge-success badge-pill" href="javascript:void(0);">#{{ $sn++ }}</a>
                                            </td>
                                            <td>
                                                <b>{{ $res->name }}</b><br>
                                                <small>{{ @$res->phone }}</small>
                                            </td>
                                            <td>
                                                <b>{{ $totalOrders }}</b>
                                            </td>
                                            <td>
                                                --
                                            </td>
                                             <td>
                                                <b>{{ $totalCashInHand }}</b>
                                            </td>
                                             <td>
                                                <b>{{ $totalCommission }}</b>
                                            </td>
                                             <td>
                                                <b>{{ $totalSettlement }}</b>
                                            </td>
                                             <td>
                                                <b>{{ $totalKM }}</b>
                                            </td>
                                             <td>
                                                --
                                            </td>
                                        </tr>
                                    @endforeach                                
                                @endif
                            </tbody>
                        </table>
                    </div>
                    @endif
                    <div class="card-footer py-4">
                        @if(count($drivers))
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $drivers->appends(Request::all())->links() }}
                        </nav>
                        @else
                            <h4>{{ __('You don`t have any drivers') }} ...</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
        @include('orders.partials.modals')
    </div>
    <!-- Cash in hand -->
    <div class="modal fade bd-example-modal-lg" id="cashInHandModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        <span class="mb-1" id="cashinhand_drivername">                            
                            {{ __('Surbhi Jain') }}<br>
                        </span>
                        <p class="mb-0">                            
                            <b id="cashinhand_driverphone"></b>
                        </p>
                        <a id="driverprofile" href="javascript:void(0);" class="fz-12 mb-0 text-mutedc text-underline">
                            View Profile
                        </a>
                    </h3>
                    <div class="ml-auto">
                        <a class="btn btn-primary btn-md" href="{{ route('settlement.index') }}">Settlement</a>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                </div>
                <div class="modal-body">
                    <h3>{{ __('Cash In Hand') }}</h3>
                    <div class="row cashinhand">
                        <div class="col-lg-4 no-gutter">
                            <label class="fz-14 d-block"><b>Order Id</b></label>
                            <div class="order-wrap h-100" id="orderlistcashinhand">
                               
                            </div>
                        </div>
                        <div class="col-lg-2 no-gutter">
                            <label class="fz-14 d-block"><b>Cash Value</b></label>
                            <div class="cashinhand-wrap h-100 d-flex align-items-center justify-content-center">
                                <span class="mb-0 text-sm"><b>₹</b><b id="pricecashinhand">0</b></span>
                            </div>
                        </div>
                        <div class="col-lg-2 no-gutter">
                            <label class="fz-14 d-block"><b>Comission</b></label>
                            <div class="comission-wrap h-100 d-flex align-items-center justify-content-center">
                                <span class="mb-0 text-sm"><b>₹</b><b id="drivercommission">-</b></span>
                            </div>
                        </div>
                        <div class="col-lg-4 no-gutter">
                            <label class="fz-14 d-block"><b>Action</b></label>
                            <div class="Action h-100 d-flex align-items-center justify-content-center cashinhandaction" id="togglebtnstatus">
                                <button type="button" class="btn btn-lg btn-toggle" data-toggle="button" id="driverSettlementStatus" aria-pressed="false" autocomplete="off">
                                    <div class="handle"></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                {{--<div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>--}}
            </div>
        </div>
    </div>
    <!--//End-->
    <script type='text/javascript'>
        /*
        $(document).ready(function(){
            // Fetch all records
            $('#but_fetchall').click(function(){
                fetchRecordsCashInHand(0);
            });

            // Search by userid
            $('#but_search').click(function(){
                var userid = Number($('#search').val().trim());                    
                if(userid > 0){
                    fetchRecordsCashInHand(userid);
                }
            });
        });
*/
    var g_driverid = '';
        function fetchRecordsCashInHand(id, dname, dphone, sstatus){
            //e.preventDefault(); 
            g_driverid = id;
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            /*
            var togglebtnstatus = '';
            if(sstatus == 1)
            {
                togglebtnstatus = '<button type="button" class="btn btn-lg btn-toggle active" data-toggle="button" id="driverSettlementStatus" aria-pressed="ture" autocomplete="off"><div class="handle"></div></button>';
            }
            else
            {
                togglebtnstatus = '<button type="button" class="btn btn-lg btn-toggle" data-toggle="button" id="driverSettlementStatus" aria-pressed="false" autocomplete="off"><div class="handle"></div></button>';
            }
            $('#togglebtnstatus').html(togglebtnstatus);
            */
            document.getElementById("driverprofile").href = "/drivers/"+id;
            $('#cashinhand_drivername').text(dname);
            $('#cashinhand_driverphone').text(dphone);
            $.ajax({
                url: '/cashInHand/getCashInHand/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    var len = 0;
                    $('#cashinHandTable tbody').empty(); // Empty <tbody>
                    if(response['data'] != null){
                        len = response['data'].length;
                    }
                    if(len > 0){
                        var orderidhtml = '';
                        var amounthtml = 0;
                        var drivercommission = 0;
                        for(var i=0; i<len; i++){
                            var order_id = response['data'][i].order_id;
                            var order_price = response['data'][i].order_price;
                            var driver_commission = response['data'][i].driver_commission;
                            orderidhtml += '<a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">'+order_id+'</a>';
                            amounthtml = parseInt(amounthtml) + parseInt(order_price);
                            drivercommission = parseInt(drivercommission) + parseInt(driver_commission);
                            /*
                            var tr_str = "<tr>" +
                                "<td align='center'><a class='btn badge badge-success badge-pill' href='javascript:void();'>#" + order_id + "</a></td>" +
                                "<td align='center'><b>₹" + total_price + "</b></td>" +
                                "<td align='center'>Deactivate</td>" +
                            "</tr>";
                            $("#cashinHandTable tbody").append(tr_str);
                            */
                        }
                        $('#orderlistcashinhand').html(orderidhtml);
                        $('#drivercommission').html(drivercommission);
                        $('#pricecashinhand').html(amounthtml);
                    }else{
                        $('.cashinhandaction').html('-');
                        $('#orderlistcashinhand').html('');
                        $('#drivercommission').html('');
                        $('#pricecashinhand').html('');
                    }
                }
            });
        }

        document.getElementById('driverSettlementStatus').onclick = function() {
            var className = ' ' + driverSettlementStatus.className + ' ';
            var s_status = 1;
            if ( ~className.indexOf(' active ') ) { 
               s_status = 0;
            } else {
               s_status = 1;
            }        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });      

            $.ajax({
                url: '/cashInHand/driverSettelmentStatus/'+g_driverid+'/'+s_status,
                type: 'get',
                dataType: 'json',
                success: function(response){                    
                }
            });
        }
    </script>

@endsection

