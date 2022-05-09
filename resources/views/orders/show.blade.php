@extends('layouts.app', ['title' => __('Orders')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-7 ">
                <br/>
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ "#".@$order->order_id." - ".@$order->created_at->format('d M Y H:i') }}</h3>
                                <span class="badge badge-primary badge-pill pull-right">
                                    @if(@$order->order_status == 'open')
                                        Restaurant Accepted
                                    @elseif(@$order->order_status == 'accepted')
                                        Delivery Boys Accepted
                                    @else
                                        {{ ucfirst(@$order->order_status) }}
                                    @endif    
                                </span>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('orders.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                       <h6 class="heading-small text-muted mb-4">{{ __('Restaurant information') }}</h6>
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <div class="pl-lg-4">
                            <h3>{{ @$order->restorant->name }}</h3>
                            <h4>{{ @$order->restorant->address }}</h4>
                            <h4>{{ @$order->restorant->phone }}</h4>
                            <h4>{{ @$order->restorant->user->email }}</h4>
                            <h4>Latitude: {{ @$order->restorant->lat?@$order->restorant->lat:"NA" }}</h4>
                            <h4>Longitude: {{ @$order->restorant->lng?@$order->restorant->lng:"NA" }}</h4>      
                        </div>
                        <hr class="my-4" />
                        <h6 class="heading-small text-muted mb-4">{{ __('Customer Information') }}</h6>
                        <div class="pl-lg-4">
                            {{--
                            <h3>{{ @$order->client->name }}</h3>
                            <h4>{{ @$order->client->email }}</h4>
                            <h4>{{ @$order->address?@$order->address->address:"" }}</h4>

                            @if(!empty(@$order->address->apartment))
                                <h4>{{ __("Apartment number") }}: {{ @$order->address->apartment }}</h4>
                            @endif
                            @if(!empty(@$order->address->entry))
                                <h4>{{ __("Entry number") }}: {{ @$order->address->entry }}</h4>
                            @endif
                            @if(!empty(@$order->address->floor))
                                <h4>{{ __("Floor") }}: {{ @$order->address->floor }}</h4>
                            @endif
                            @if(!empty(@$order->address->intercom))
                                <h4>{{ __("Intercom") }}: {{ @$order->address->intercom }}</h4>
                            @endif
                            @if(!empty(@$order->client->phone))
                            <br/>
                            <h4>{{ __('Contact')}}: {{ @$order->client->phone }}</h4>
                            @endif
                            --}}
                            <h3>{{ $customer_address->billing_address->full_name }}</h3>
                            <h4>{{ $customer_address->billing_address->address }}</h4>
                            <h4>Latitude: {{ @$customer_address->billing_address->latitude }}</h4>
                            <h4>Longitude: {{ @$customer_address->billing_address->longitude }}</h4>                            
                            <h4>{{ $customer_address->billing_address->phone }}</h4>
                        </div>
                        <hr class="my-4" />
                        <h6 class="heading-small text-muted mb-4">{{ __('Order') }}</h6>
                        <ul id="order-items">
                            @foreach(@$order->items as $item)
                                <li><h4>{{ $item->pivot->qty." X ".$item->name }} ( @money( $item->price, env('CASHIER_CURRENCY','INR'),true) )   =    @money( $item->pivot->qty*$item->price, env('CASHIER_CURRENCY','INR'),true)</h4></li>
                            @endforeach
                        </ul>
                        @if(!empty(@$order->comment))
                        <br/>
                        <h4>{{ __('Comment') }}: {{ @$order->comment }}</h4>
                        @endif
                        <br/>
                        <h4>{{ __("Order Price") }}: @money( @$order->order_price, env('CASHIER_CURRENCY','INR'),true)</h4>
                   
                        </hr>
                        <h4>{{ __("GST(inclusive):") }}: @money( @$order->delivery_price, env('CASHIER_CURRENCY','INR'),true)</h4>
                        <h4>{{ __("Cash on Delivery	") }}: --</h4>
                        <!-- <h4>{{ __("Total Tax") }}: @money( @$order->delivery_price, env('CASHIER_CURRENCY','INR'),true)</h4> -->
                        <hr />
                        <h3>{{ __("TOTAL") }}: @money( @$order->total_price, env('CASHIER_CURRENCY','INR'),true)</h3>
                        <hr />
                        <h4>{{ __("Payment method") }}: {{ __(strtoupper(@$order->payment_method)) }}</h4>
                        <h4>{{ __("Order status") }}: {{ __(ucfirst(@$order->payment_status)) }}</h4>
                        <hr />
                        <h4>{{ __("Delivery method") }}: {{ @$order->delivery_method==1?__('Delivery'):__('Pickup') }}</h4>
                        <h3>{{ __("Time slot") }}: @include('orders.partials.time', ['time'=>@$order->time_formated])</h3>



                    </div>
                   @include('orders.partials.actions.buttons',['order'=>$order])
                </div>
            </div>
            <div class="col-xl-5  mb-5 mb-xl-0">

                <br/>
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h5 class="h3 mb-0">{{ __("Item List")}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col" class="sort" data-sort="Product">Product</th>
                                        <th scope="col" class="sort" data-sort="Quantity">Quantity</th>
                                        
                                        <th scope="col" class="sort" data-sort="Total">Total</th>
                                     </tr>
                                </thead>
                                <tbody class="list">
                                   
                                   @foreach(json_decode(@$order->item_json) as $key=>$items)
                                    <tr>
                                      
                                        <th scope="row">
                                            <div class="media align-items-center">
                                                
                                                <div class="media-body">
                                                    <span class="name mb-0 text-sm"> {{ $items->name}}</span><br>
                                                  

                                                </div>
                                            </div>
                                        </th>
                                        <td class="budget">
                                        
                                        {{ $items->quantity}}
                                        </td>
                                        
                                        <td class="budget">
                                        {{ $items->price}}
                                        </td>

                                    </tr>  
                                    @endforeach 
                                </tbody> 
                        </table> 
                        </div>
                    </div>
                </div>

                <br/>
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h5 class="h3 mb-0">{{ __("Driver Location")}}</h5>
                    </div>
                    <div class="card-body">
                        @include('orders.partials.map',['order'=>$order])
                    </div>
                </div>
                <br/>
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h5 class="h3 mb-0">{{ __("Distance Calculation")}}</h5>
                    </div>
                    <div class="card-body">
                        @include('orders.partials.mapDriver',['order'=>$order])
                    </div>
                </div>
                <br/>
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h5 class="h3 mb-0">{{ __("Status History")}}</h5>
                    </div>
                    <div class="card-body">
                        <div class="timeline timeline-one-side" id="status-history" data-timeline-content="axis" data-timeline-axis-style="dashed">
                            <?php
                                $driver_name = DB::table('driver_details')->select('name')->where('user_id',@$order->driver_id)->first('name');
                            ?>
                            {{--
                            @foreach(@$order->status as $key=>$value)
                                <div class="timeline-block">
                                    <span class="timeline-step badge-success">
                                        <i class="ni ni-basket text-success"></i>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">{{ __($value->name) }}</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ $value->pivot->created_at->format('d M Y h:i') }}</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">{{ __('Status from') }}: {{$userNames[$key] }}</h6>
                                    </div>
                                </div>
                            @endforeach
                            --}}
                            <div class="timeline-block">
                                <span class="timeline-step badge-success">
                                    <div class="blob green"></div>
                                </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Order Recived By') }}</span>
                                        </div>
                                        <div class="text-right">
                                            <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->created_at->format('d M Y h:i') }}</small>
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">{{ $customer_address->billing_address->full_name }}</h6>
                                </div>
                            </div>  
                            @if(@$order->accept_reject_restorant == 1)   
                                <div class="timeline-block">
                                    <span class="timeline-step badge-success">
                                        <div class="blob green"></div>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">{{ __('Accepted by Restaurant') }}</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->created_at->format('d M Y h:i') }}</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">{{ @$order->restorant->name }}</h6>
                                    </div>
                                </div>  
                            @elseif(@$order->accept_reject_restorant == 2)  
                                <div class="timeline-block">
                                    <span class="timeline-step badge-warning">
                                        <div class="blob red"></div>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">{{ __('Reject by Restaurant') }}</span>
                                            </div>
                                            <div class="text-right">
                                                @if(@$order->accepted_admin_date > 0)  
                                                    <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->accepted_admin_date->format('d M Y h:i') }}</small>
                                                @else
                                                    <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                                @endif 
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">{{ @$order->restorant->name }}</h6>
                                    </div>
                                </div>  
                            @else
                                <div class="timeline-block">
                                    <span class="timeline-step badge-warning">
                                        <div class="blob red"></div>
                                    </span>
                                    <div class="timeline-content">
                                        <div class="d-flex justify-content-between pt-1">
                                            <div>
                                                <span class="text-muted text-sm font-weight-bold">{{ __('Pending by Restaurant') }}</span>
                                            </div>
                                            <div class="text-right">
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                            </div>
                                        </div>
                                        <h6 class="text-sm mt-1 mb-0">NA</h6>
                                    </div>
                                </div>  
                            @endif      
                            @if(@$order->accept_reject_driver == 1)           
                            <div class="timeline-block">
                                <span class="timeline-step badge-success">
                                    <div class="blob green"></div>
                                </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Accepted by Driver') }}</span>
                                        </div>
                                        <div class="text-right">
                                            @if(@$order->accepted_driver_date > 0)  
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->accepted_driver_date->format('d M Y h:i') }}</small>
                                            @else
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                            @endif 
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">{{ $driver_name?$driver_name:"NA" }}</h6>
                                </div>
                            </div>      
                            @elseif(@$order->accept_reject_driver == 2)    
                            <div class="timeline-block">
                                <span class="timeline-step badge-warning">
                                    <div class="blob red"></div>
                                </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Reject by Driver') }}</span>
                                        </div>
                                        <div class="text-right">
                                            @if(@$order->accepted_driver_date > 0)  
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->accepted_driver_date->format('d M Y h:i') }}</small>
                                            @else
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                            @endif 
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">{{ $driver_name?$driver_name:"NA" }}</h6>
                                </div>
                            </div>      
                            @else  
                            <div class="timeline-block">
                                <span class="timeline-step badge-warning">
                                    <div class="blob red"></div>
                                </span>
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Pending From Driver') }}</span>
                                        </div>
                                        <div class="text-right">
                                            <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">{{ __('NA') }}</h6>
                                </div>
                            </div>  
                            @endif 
                            <div class="timeline-block">
                                @if(@$order->reached_resturant_date > 0)    
                                    <span class="timeline-step badge-success">
                                        <div class="blob green"></div>
                                    </span>
                                @else
                                    <span class="timeline-step badge-warning">
                                        <div class="blob red"></div>
                                    </span>
                                @endif  
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Reached to Restaurant') }}</span>
                                        </div>
                                        <div class="text-right">
                                            @if(@$order->reached_resturant_date > 0)  
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->reached_resturant_date->format('d M Y h:i') }}</small>
                                            @else
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                            @endif  
                                        </div>
                                    </div>
                                    <h6 class="text-sm mt-1 mb-0">{{ $driver_name?$driver_name:"NA" }}</h6>
                                </div>
                            </div>
                            <div class="timeline-block">
                                @if(@$order->pickup_date > 0)    
                                    <span class="timeline-step badge-success">
                                        <div class="blob green"></div>
                                    </span>
                                @else
                                    <span class="timeline-step badge-warning">
                                        <div class="blob red"></div>
                                    </span>
                                @endif 
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Pickup') }}</span>
                                        </div>
                                        <div class="text-right">
                                            @if(@$order->pickup_date > 0)  
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->pickup_date->format('d M Y h:i') }}</small>
                                            @else
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                            @endif  
                                        </div>
                                    </div>
                                    {{--<h6 class="text-sm mt-1 mb-0">{{ __('Status from') }}: {{ __('NA') }}</h6>--}}
                                </div>
                            </div>
                            <div class="timeline-block">
                                @if(@$order->reached_of_customer_date > 0)    
                                    <span class="timeline-step badge-success">
                                        <div class="blob green"></div>
                                    </span>
                                @else
                                    <span class="timeline-step badge-warning">
                                        <div class="blob red"></div>
                                    </span>
                                @endif 
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Reached of Customer') }}</span>
                                        </div>
                                        <div class="text-right">
                                            @if(@$order->reached_of_customer_date > 0)  
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->reached_of_customer_date->format('d M Y h:i') }}</small>
                                            @else
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                            @endif  
                                        </div>
                                    </div>
                                    {{--<h6 class="text-sm mt-1 mb-0">{{ __('Status from') }}: {{ __('NA') }}</h6>--}}
                                </div>
                            </div>
                            <div class="timeline-block">
                                @if(@$order->delivered_to_customer > 0)    
                                    <span class="timeline-step badge-success">
                                        <div class="blob green"></div>
                                    </span>
                                @else
                                    <span class="timeline-step badge-warning">
                                        <div class="blob red"></div>
                                    </span>
                                @endif 
                                <div class="timeline-content">
                                    <div class="d-flex justify-content-between pt-1">
                                        <div>
                                            <span class="text-muted text-sm font-weight-bold">{{ __('Delivered To Customer') }}</span>
                                        </div>
                                        <div class="text-right">
                                            @if(@$order->delivered_to_customer > 0)  
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>{{ @$order->delivered_to_customer->format('d M Y h:i') }}</small>
                                            @else
                                                <small class="text-muted"><i class="fas fa-clock mr-1"></i>NA</small>
                                            @endif  
                                        </div>
                                    </div>
                                    {{-- <h6 class="text-sm mt-1 mb-0">{{ __('Status from') }}: {{ __('NA') }}</h6>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
        @include('layouts.footers.auth')
        @include('orders.partials.modals')
    </div>
@endsection

