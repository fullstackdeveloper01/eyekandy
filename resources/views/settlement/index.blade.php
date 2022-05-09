@extends('layouts.app', ['title' => __('Settlement')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        @if(count($orders))
                        <form method="GET" action="{{ route('settlement.index') }}">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Settlement') }}</h3>
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
                    <div class="table-responsive">
                        <table class="table align-items-center">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Settlement ID') }}</th>                             
                                    <th scope="col">{{ __('Driver Name') }}</th>                             
                                    <th scope="col">{{ __('Cash In Hand') }}</th>                             
                                    <th scope="col">{{ __('Commission') }}</th>                             
                                    <th scope="col">{{ __('Total Price') }}</th>                             
                                    <th scope="col">{{ __('Order ID') }}</th>                             
                                    <th scope="col">{{ __('Action') }}</th>                             
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($settlement_result))
                                    @foreach($settlement_result as $settlement)
                                        <tr>
                                            <td>
                                                <a class="btn badge badge-success badge-pill" href="javascript:void()">
                                                    #SIT{{ $settlement->id }}
                                                </a>
                                            </td>
                                            <td><span>{{ $settlement->drivername }}</span></td>
                                            <td><span>₹{{ $settlement->total_payment }}</span></td>
                                            <td><span>₹{{ $settlement->driver_commission }}</span></td>
                                            <td>
                                                @if($settlement->driver_commission != '')
                                                    {{ $settlement->total_payment - $settlement->driver_commission }}
                                                @else
                                                    {{ $settlement->total_payment }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $settlement->order_id }}
                                            </td>
                                            <td>
                                                @if($settlement->active == 1)
                                                    <button type="submit" class="btn btn-success btn-md btn-block" onclick="getSettlementPrice('{{ $settlement->id }}')" data-toggle="modal" data-target="#afterSettlementModal">History</button>
                                                @else
                                                    <button type="submit" class="btn btn-primary btn-md btn-block" onclick="setSettlementPrice('{{ $settlement->id }}','{{ $settlement->total_payment }}')" data-toggle="modal" data-target="#settlementModal">Settlement</button>
                                                @endif
                                            </td>
                                        </tr>                                        
                                    @endforeach
                                @endif                                
                            </tbody>
                        </table>
                    </div>            
                    <div class="card-footer py-4">
                        @if(count($settlement_result))
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $settlement_result->appends(Request::all())->links() }}
                        </nav>
                        @else
                            <h4>{{ __('You don`t have any orders') }} ...</h4>
                        @endif
                    </div>         
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
        @include('settlement.partials.modals')
    </div>
    <!-- Settlement Modal -->
    <div class="modal fade bd-example-modal-lg" id="settlementModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Settled Payments
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="settlement_form" method="post" action="javascript:void(0)">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="payment">Payment Received<span class="pull-right spayment"></span></label>
                                    <input type="hide" style="display: none;" id="payment_id" name="id" readonly class="form-control hide">
                                    <input type="text" id="payment_received" name="payment_received" readonly class="form-control">
                                    <span class="text-danger err_payment_received"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="mode">Mode</label>
                                    <select type="text" id="payment_mode" name="payment_mode" class="form-control">
                                        <option value="">Select Mode</option>
                                        <option value="UPI">UPI</option>
                                        <option value="Online">Online</option>
                                        <option value="Cash">Cash</option>
                                    </select>
                                    <span class="text-danger err_payment_mode"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="details">Details</label>
                                    <textarea type="text" id="description" name="description" row="4" class="form-control"></textarea>
                                    <span class="text-danger err_description"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" onClick="settlmentSubmit()" class="btn btn-primary btn-md btn-block">Collect</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="afterSettlementModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Settled Payments
                    </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <p>
                                    <a class="btn badge badge-success badge-pill" href="javascript:void()" id="setid"></a>
                                </p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label id="updateddate_" class="float-right"></label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="payment">Payment Received</label>
                                <input type="text" id="payment_" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="mode">Mode</label>
                                <input type="text" id="mode_" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="details">Details</label>
                                <textarea type="text" id="details_" row="4" readonly class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <button data-dismiss="modal" aria-label="Close" class="btn btn-success close">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setSettlementPrice(sid, sprice)
        {
            $('#payment_id').val(sid);
            $('#payment_received').val(sprice);
        }

        function settlmentSubmit()
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var payment_received = $('#payment_received').val();
            var payment_mode = $("#payment_mode option:selected").val();
            var description = $('#description').val();
            if(payment_received != '' && payment_mode != '' && description != '')
            {
                $.ajax({
                    url: "{{ url('settlement-form-submit')}}",
                    method: 'post',
                    data: $('#settlement_form').serialize(),
                    success: function(response){    
                        if(response)       
                        {
                            document.getElementById("settlement_form").reset(); 
                            $('.close').click();
                            location.reload();                    
                        }                 
                    }
                }); 
            }
            else
            {
                if(payment_received == '')
                {
                    $('.err_payment_received').text('Payment received field is required');
                    setTimeout(function(){
                        $('.err_payment_received').text('');
                    },50000);
                }
                if(payment_mode == '')
                {
                    $('.err_payment_mode').text('Payment mode field is required');
                    setTimeout(function(){
                        $('.err_payment_mode').text('');
                    },50000);
                }
                if(description == '')
                {
                    $('.err_description').text('Description field is required');
                    setTimeout(function(){
                        $('.err_description').text('');
                    },50000);
                }
            }            
        }

        function getSettlementPrice(id)
        {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $.ajax({
                url: '/settlement/getSettlementPrice/'+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                    console.log(response);
                    $('#payment_').val(response.payment);
                    $('#mode_').val(response.mode);
                    $('#details_').text(response.details);
                    $('#setid').text(response.id);
                    $('#updateddate_').text(response.created_at);
                }
            });
        }
    </script>
@endsection

