@extends('layouts.app', ['title' => __('Cash In Hand')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        @if(count($orders))
                            <form method="GET" action="{{ route('orders.index') }}">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">{{ __('Cash In Hand') }}</h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button id="show-hide-filters" class="btn btn-icon btn-1 btn-sm btn-outline-secondary" type="button">
                                            <span class="btn-inner--icon"><i id="button-filters" class="ni ni-bold-down"></i></span>
                                        </button>
                                    </div>
                                </div>
                                <br/>
                                <div class="tab-content orders-filters">
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
                                        @hasrole('admin|driver')
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="restorant">{{ __('Filter by Restaurant') }}</label>
                                                    <select class="form-control select2" name="restorant_id">
                                                        <option disabled selected value> -- {{ __('Select an option') }} -- </option>
                                                        @foreach ($restorants as $restorant)
                                                            <option <?php if(isset($_GET['restorant_id'])&&$_GET['restorant_id'].""==$restorant->id.""){echo "selected";} ?> value="{{ $restorant->id }}">{{$restorant->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endhasrole
                                        @hasrole('admin|owner')
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label class="form-control-label" for="client">{{ __('Filter by Customer') }}</label>

                                                <select class="form-control select2" id="blabla" name="client_id">
                                                    <option disabled selected value> -- {{ __('Select an option') }} -- </option>
                                                    @foreach ($clients as $client)
                                                        <option  <?php if(isset($_GET['client_id'])&&$_GET['client_id'].""==$client->id.""){echo "selected";} ?>  value="{{ $client->id }}">{{$client->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @endhasrole
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
                                                    <a href="{{ route('orders.index') }}" class="btn btn-md btn-block">{{ __('Clear Filters') }}</a>
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
                    @if(count($orders))
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ORD No') }}</th>
                                    <th scope="col">{{ __('Date Time') }}</th>
                                    @hasrole('admin|owner|driver')
                                        <th class="table-web" scope="col">{{ __('Customer Name') }}</th>
                                    @endhasrole
                                    @hasrole('admin|driver')
                                        <th scope="col">{{ __('Restaurant Name') }}</th>
                                    @endhasrole
                                    @hasrole('admin|owner')
                                        <th class="table-web" scope="col">{{ __('Driver Name') }}</th>
                                    @endhasrole
                                    @role('admin|owner')
                                        <th class="table-web" scope="col">{{ __('Total Items') }}</th>
                                    @endrole
                                    <th class="table-web" scope="col">{{ __('KM') }}</th>
                                    <th class="table-web" scope="col">{{ __('Cash In Hand') }}</th>
                                    <th class="table-web" scope="col">{{ __('Driver Commission') }}</th>
                                    <th class="table-web" scope="col">{{ __('Total Price') }}</th>
                                    <th class="table-web" scope="col">{{ __('Total Time') }}</th>                                    
                                </tr>
                            </thead>
                            <tbody>
                           
                            @foreach($orders as $order)
                            <?php
                                $customer_address = json_decode($order->order_json);
                                $driver_name = DB::table('driver_details')->select('name')->where('user_id',$order->driver_id)->first();
                                $driver_settlement_status = DB::table('driver_details')->select('settlement_status')->where('user_id',$order->driver_id)->first();
                                $driver_phone = DB::table('users')->select('phone')->where('id',$order->driver_id)->first();
                            ?>
                            <tr>
                                <td>
                                    <!--<span class="text-primary order_id" name="order-id" style="cursor:pointer" value='{{ $order->id }}' data-toggle="modal" data-target="#modal-order-details">{{ $order->id }}</span>-->
                                    @if($order->payment_method == 'Cash on Delivery')
                                        <a class="btn badge badge-success badge-pill" href="{{ route('orders.show',$order->id )}}">#{{ $order->order_id}}</a>
                                    @else
                                        <a class="btn badge badge-primary badge-pill" href="{{ route('orders.show',$order->id )}}">#{{ $order->order_id}}</a>
                                    @endif
                                </td>
                                <td class="table-web">
                                    {{ $order->created_at->format('d M Y') }}<br>
                                    {{ $order->created_at->format('H:i:s A') }}
                                </td>
                                @hasrole('admin|owner|driver')
                                <td class="table-web" style="white-space: normal;">
                                   <span class="mb-0 text-sm"><b>{{ @$customer_address->billing_address->full_name }}</b></span>
                                   <div class="media-body">
                                        <small>{{ @$customer_address->billing_address->address }}</small>
                                    </div>
                                </td>
                                @endhasrole
                                @hasrole('admin|driver')
                                <td style="white-space: normal;">
                                    <div class="media align-items-center">
                                        {{--
                                        <a class="avatar-custom mr-3">
                                            <img class="rounded" alt="..." src="{{ @$order->restorant->icon }}">
                                        </a>
                                        --}}
                                        <div class="media-body">
                                            <span class="mb-0 text-sm">{{ @$order->restorant->name?$order->restorant->name:"NA" }}</span><br>
                                            <small>{{ @$order->restorant->address }}</small>
                                        </div>
                                    </div>
                                </td>
                                @endhasrole
                                <td class="table-web">
                                    <div class="media-body">
                                        {{--
                                        <a href="{{ route('drivers.show',$order->driver_id )}}">
                                            <span class="mb-0 text-sm"><b>{{ ucfirst($driver_name->name) }}</b></span>
                                        </a>
                                        --}}
                                        <a href="javascript:void(0);" data-toggle="modal" onclick="fetchRecordsCashInHand({{ $order->driver_id}}, '{{ $driver_name->name }}', '{{ $driver_phone->phone }}', '{{ $driver_settlement_status->settlement_status }}')" data-target="#cashInHandModal">
                                            <span class="mb-0 text-sm"><b>{{ ucfirst($driver_name->name) }}</b></span>
                                        </a>
                                        <br>
                                        <small>{{ $driver_phone->phone }}</small>
                                    </div>
                                </td>
                                @role('admin|owner')
                                    <td class="table-web">
                                        <?php $item = json_decode($order->item_json); $total_item =count($item); ?>
                                        {{( $total_item )}}
                                    </td>
                                @endrole
                                <td class="table-web">
                                    {{ @$order->distance_restorent_customer }} KM
                                </td>
                                <td class="table-web">
                                    @money( $order->order_price, env('CASHIER_CURRENCY','INR'),true)
                                </td>
                                <td class="table-web">
                                   ₹{{ @$order->driver_commission?$order->driver_commission:0 }}
                                </td>
                                <td class="table-web">
                                    <?php
                                    /*
                                        if($order->delivered_to_customer > 0)
                                        {
                                            $start = $order->created_at;
                                            $end = $order->delivered_to_customer;
                                            $duration = $end->diffInHours($start);
                                            echo gmdate('H:i', $duration);
                                        }*/
                                    ?>
                                    NA
                                </td>
                            </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                    @endif
                    <div class="card-footer py-4">
                        @if(count($orders))
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $orders->appends(Request::all())->links() }}
                        </nav>
                        @else
                            <h4>{{ __('You don`t have any orders') }} ...</h4>
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

