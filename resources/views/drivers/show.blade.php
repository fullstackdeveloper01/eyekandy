    @extends('layouts.app', ['title' => __('Driver')])

    @section('content')
        <style>
            .btn-toggle {
                margin: 0 auto;
                padding: 0;
                position: relative;
                border: none;
                height: 1.5rem;
                width: 3rem;
                border-radius: 1.5rem;
                color: #6b7381;
                background: #bdc1c8;
            }
            .btn-toggle:focus,
            .btn-toggle.focus,
            .btn-toggle:focus.active,
            .btn-toggle.focus.active {
                outline: none;
            }
            .btn-toggle:before,
            .btn-toggle:after {
                line-height: 1.5rem;
                width: 4rem;
                text-align: center;
                font-weight: 600;
                font-size: 8px;
                text-transform: uppercase;
                letter-spacing: 2px;
                position: absolute;
                bottom: 0;
                transition: opacity 0.25s;
            }
            .btn-toggle:before {
                content: 'Unapproved';
                left: -5rem;
            }
            .btn-toggle:after {
                content: 'Approved';
                right: -4rem;
                opacity: 0.5;   
            }
            .btn-toggle > .handle {
                position: absolute;
                top: 0.1875rem;
                left: 0.1875rem;
                width: 1.125rem;
                height: 1.125rem;
                border-radius: 1.125rem;
                background: #fff;
                transition: left 0.25s;
            }
            .btn-toggle.active {
                transition: background-color 0.25s;
                background-color: #29b5a8;
            }
            .btn-toggle.active > .handle {
                left: 1.6875rem;
                transition: left 0.25s;
            }
            .btn-toggle.active:before {
                opacity: 0.5;
            }
            .btn-toggle.active:after {
                opacity: 1;
            }
            
        </style>
        <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8 text-right">
            <div class="container-fluid">
                <button type="button" class="btn btn-primary btn-md mr">Back</button>
            </div>
        </div>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-9">
                    <br/>
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0 bg-yellow-fade br-6 bordered">
                            <div class="row">
                                <div class="col-3">
                                    <h4 class="mb-0">@if(!empty($driver_detail)){{ $driver_detail->name }}@endif</h4>
                                    <h5 class="mb-0">#DRI{{ ($driver)?$driver->id:"NA" }}</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Availability</h4>
                                    @if($driver_detail->active==1) <div class="blob green"></div> @else <div class="blob red"></div> @endif                                    
                                </div>  
                                <div class="col-3">
                                    <h4 class="mb-0">Current Location</h4>
                                    <h5 class="mb-0">@if(!empty($driver_detail)){{ $driver_detail->current_location }}@endif</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Contact Number</h4>
                                    <h5 class="mb-0">@if(!empty($driver)){{ $driver->phone }}@endif</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Vehicle</h4>
                                    <h5 class="mb-0">@if(!empty($driver_detail)){{ $driver_detail->vehicle_type }}@endif</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">City</h4>
                                    <h5 class="mb-0">@if(!empty($driver_detail)){{ $driver_detail->city_name }}@endif</h5>
                                </div>  
                                <div class="col-3">
                                    <h4 class="mb-0">T-Shirt Size</h4>
                                    <h5 class="mb-0">@if(!empty($driver_detail)){{ $driver_detail->t_shirt_size }}@endif</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Joining Date</h4>
                                    <h5>{{$driver->created_at->format('d M Y H:i')}}</h5>
                                </div>
                                <!--<div class="col-8">
                                    <h3 class="mb-0">{{ "#".$driver->name }}</h3>
                                    <h5>{{$driver->created_at->format('d M Y H:i')}}</h5>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('drivers.index') }}" class="btn btn-sm btn-primary">{{ __('Back') }}</a>
                                    @if(!empty($driver_detail))
                                        @if($driver_detail->admin_approved==0)
                                            <a class="btn btn-sm btn-primary" href="approved/{{$driver_detail->user_id}}">{{ __('Approved') }}</a>
                                        @else
                                        <a class="btn btn-sm btn-primary" href="unapproved/{{$driver_detail->user_id}}">{{ __('Unapproved') }}</a>
                                        @endif
                                    @endif
                                </div>-->
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="card-header">
                            <h6 class="heading-small text-muted mb-0">{{ __('Personal information') }}</h6>
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">
                                    <h3 class="custom-font"><span class="text-muted">{{ __('Name') }}:</span>  @if(!empty($driver_detail)){{ $driver_detail->name }}@endif
                                    @if(!empty($driver_detail))<!--<img float="right" class="image" data-toggle="modal" data-target="#imageModal" src="{{ asset($driver_detail->profile_photo) }}" height="50" width="50">-->@endif
                                    </h3>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Contact')}}:</span> {{ $driver->phone }}</h4>
                                    <!-- <h4>{{ __("Middle Name") }}:  @if(!empty($driver_detail)){{$driver_detail->middle_name}} @endif</h4> -->

                                    <h4 class="custom-font"><span class="text-muted">{{ __('Father Name') }}:</span>  @if(!empty($driver_detail)){{ $driver_detail->father_name }} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('DOB') }}:</span> @if(!empty($driver_detail)){{ $driver_detail->dob }} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Gender') }}:</span> @if(!empty($driver_detail)){{ ucfirst($driver_detail->gender) }} @endif</h4>
                                    <!-- <h4>{{ __('User Name / Email') }}: {{ $driver->name.", ".$driver->email }}</h4> -->
                                    @if(!empty($driver->phone))
                                </div>
                                <div class="col-lg-3">
                                    @endif
                                    <h4 class="custom-font"><b>{{ __('Permanent Address') }}</b></h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Address') }}:</span>  @if(!empty($driver_detail)){{ $driver_detail->address}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Address1') }}:</span> @if(!empty($driver_detail)){{ $driver_detail->address1}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('City') }}:</span>  @if(!empty($driver_detail)){{ $driver_detail->district}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('State') }}:</span>  @if(!empty($driver_detail)) {{ $driver_detail->state}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Pincode') }}:</span>  @if(!empty($driver_detail)) {{ $driver_detail->pincode}} @endif</h4>
                                </div>
                                <div class="col-lg-3">
                                    <h4 class="custom-font"><b>{{ __('Current Address') }}</b></h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Address1') }}:</span>  @if(!empty($driver_detail)) {{ $driver_detail->current_address1}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Address2') }}:</span>  @if(!empty($driver_detail)){{ $driver_detail->current_address2}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('City') }}:</span>  @if(!empty($driver_detail)){{ $driver_detail->current_district}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('State') }}:</span> @if(!empty($driver_detail)){{ $driver_detail->current_state}} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __('Pincode') }}:</span>  @if(!empty($driver_detail)){{ $driver_detail->current_pincode}} @endif</h4>
                                </div>
                                <div class="col-lg-3">
                                    <div class="image-wrapper" style="width: 100%;height: 175px;">
                                        <!--<img class="img-fluid" data-toggle="modal" data-target="#imageModal" src="{{ asset($driver_detail->profile_photo) }}" style="width: 100%;height: 100%;object-fit: scale-down;">-->
                                        <img class="img-fluid" src="{{ asset($driver_detail->profile_photo) }}" style="width: 100%;height: 100%;object-fit: scale-down;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Nominee Information') }}</h6>
                                </div>
                                <div class="card-body">
                                    <h3 class="custom-font"><span class="text-muted">{{ __("Name") }}:</span> @if($nominee_detail){{ $nominee_detail->nominee_name}} @endif</h3>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Relationship") }}:</span> @if($nominee_detail){{ $nominee_detail->nominee_relationship }} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Phone") }}:</span> @if($nominee_detail){{ $nominee_detail->nominee_mobile }} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("DOB") }}:</span> @if($nominee_detail){{ $nominee_detail->nominee_dob }} @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Emergency Contact Name") }}:</span> @if($nominee_detail)@if($nominee_detail->emergency_contact_name) {{ $nominee_detail->emergency_contact_name }} @endif  @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Emergency Contact Number") }}:</span> @if($nominee_detail) @if($nominee_detail->emergency_contact_number) {{ $nominee_detail->emergency_contact_number }} @endif  @endif</h4>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Other Information') }}</h6>
                                </div>
                                <div class="card-body">
                                    @if(!empty($driver_detail))  
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Registered") }}:</span> {{ $driver->type }}</h4>  
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Delivery Mode") }}:</span> {{ $driver_detail->delivery_mode }}</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("T-Shirt Size") }}:</span> {{ $driver_detail->t_shirt_size }}</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Status") }}:</span> @if($driver_detail->active==1) Active @else Inactive @endif</h4>
                                    <h4 class="custom-font"><span class="text-muted">{{ __("Approved Status") }}:</span> @if($driver_detail->admin_approved==1) Approved @else Unapproved @endif</h4>
                                    @endif
                                </div>  
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Zone/ Shift') }}</h6>
                                </div>
                                <div class="card-body">
                                    @if(!empty($driver_detail)){{ $driver_detail->zone_area }}@endif
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Packages') }}</h6>
                                </div>
                                <div class="card-body">
                                    
                                </div>  
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __("Pan Card Information")}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="content">
                                            @if(!empty($driver_detail))    
                                            <h4 class="custom-font"><span class="text-muted">{{ __('Pan Card Name') }}:</span> {{ $driver_detail->pancard_name }}</h4>
                                            <h4 class="custom-font"><span class="text-muted">{{ __("Pan Card Number") }}:</span> {{ $driver_detail->pancard_number }}</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="img-wrapper" style="width:200px;height:200px;display: flex;align-items: center;justify-content: center;cursor:pointer;">
                                                <!--<h4>{{ __("Pan Card Image") }}: @if($driver_detail->image_pancard)--><img class="image" data-toggle="modal" data-target="#imageModal" src="{{ asset($driver_detail->image_pancard) }}" class="img-fluid" style="width:100%;height:100%;object-fit:scale-down;"><!--@endif</h4>-->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __("Aadhar Card Information")}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="content">
                                            @if(!empty($driver_detail))
                                            @if(!empty($driver_detail->aadhar_card_name))
                                            <h4 class="custom-font"><span class="text-muted">{{ __('Aadhar Card Name') }}:</span> {{ $driver_detail->aadhar_card_name }}</h4>
                                            @endif
                                            <h4 class="custom-font"><span class="text-muted">{{ __("Aadhar Card Number") }}:</span> {{ $driver_detail->aadhar_card_no }}</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="img-wrapper" style="width:200px;height:200px;display: flex;align-items: center;justify-content: center;cursor:pointer;">
                                                <!--<h4>{{ __("Aadhar Card Image") }}: @if($driver_detail->aadhar_card)--><img class="image" data-toggle="modal" data-target="#imageModal" src="{{ asset($driver_detail->aadhar_card) }}" class="img-fluid" style="width:100%;height:100%;object-fit:scale-down;"><!--@endif</h4>-->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __("Driving License Information")}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="content">
                                            @if(!empty($driver_detail))
                                            <h4 class="custom-font"><span class="text-muted">{{ __('Driving License Number') }}:</span> {{ $driver_detail->dl_number }}</h4>
                                            <h4 class="custom-font"><span class="text-muted">{{ __("Driving License Expiry Date") }}:</span> {{ $driver_detail->driving_license_expiry_date }}</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="img-wrapper" style="width:200px;height:200px;display: flex;align-items: center;justify-content: center;cursor:pointer;">
                                                <!--<h4>{{ __("Driving License Image") }}: @if( $driver_detail->driving_license)--><img class="image" data-toggle="modal" data-target="#imageModal" src="{{ asset($driver_detail->driving_license) }}" class="img-fluid" style="width:100%;height:100%;object-fit:scale-down;"><!--@endif</h4>-->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __("Bank Information")}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="content">
                                            @if(!empty($driver_detail))
                                            <h3 class="custom-font"><span class="text-muted">{{ __("Bank Name") }}:</span> {{ $driver_detail->bank_name}}</h3>
                                            <h4 class="custom-font"><span class="text-muted">{{ __("Account Number") }}:</span> {{ $driver_detail->account_number }}</h4>
                                            <h4 class="custom-font"><span class="text-muted">{{ __("IFSC Code") }}:</span> {{ $driver_detail->bank_ifsc_code }}</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="img-wrapper" style="width:200px;height:200px;display: flex;align-items: center;justify-content: center;cursor:pointer;">
                                                <!--<h4>{{ __("Bank Document Image") }}: @if($driver_detail->bank_document)--><img  class="image" data-toggle="modal" data-target="#imageModal" src="{{ asset($driver_detail->bank_document) }}" class="img-fluid" style="width:100%;height:100%;object-fit:scale-down;"><!--@endif</h4>-->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __("Vehicle Information")}}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="content">
                                            @if(!empty($driver_detail))              
                                            @if(!empty($driver_detail->vehicle_type))
                                            <h4 class="custom-font"><span class="text-muted">{{ __('Vehicle Type') }}:</span> {{ $driver_detail->vehicle_type }}</h4>
                                            @endif
                                            <h4 class="custom-font"><span class="text-muted">{{ __("Vehicle Number") }}:</span> {{ $driver_detail->vehicle_number }}</h4>
                                            <h4 class="custom-font"><span class="text-muted">{{ __("Vehicle Make") }}:</span> {{ $driver_detail->vehicle_make }}</h4>
                                            <h4 class="custom-font"><span class="text-muted">{{ __("Vehicle Insurance Number") }}:</span> {{ $driver_detail->vehicle_insurance_number }}</h4>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="img-wrapper" style="width:200px;height:200px;display: flex;align-items: center;justify-content: center;cursor:pointer;">
                                                <!--<h4>{{ __("Vehicle Registartion Certificate") }}: @if($driver_detail->vehicle_registartion_certificate )--><img class="image" data-toggle="modal" data-target="#imageModal" src="{{ asset($driver_detail->vehicle_registartion_certificate) }}" class="img-fluid" style="width:100%;height:100%;object-fit:scale-down;"><!--@endif</h4>-->
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-5 mb-xl-0">
                    <br/>
                    <div class="card card-profile shadow text-center">
                        <div class="card-header">
                            @if($driver_detail->admin_approved==0)
                                <button type="button" class="btn btn-sm btn-toggle" data-toggle="button" id="driverSettlementStatus" aria-pressed="false" autocomplete="off">
                                    <div class="handle"></div>
                                </button>
                            @else
                                <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" id="driverSettlementStatus" aria-pressed="true" autocomplete="off">
                                    <div class="handle"></div>
                                </button>
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Cash In Hand') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i class="ni ni-money-coins text-orange mr-2"></i>
                                        <h4 class="mb-0">₹ 4000</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Commision') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i class="fa fa-credit-card text-blue mr-2" aria-hidden="true"></i>
                                        <h4 class="mb-0">₹ 500</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Current location') }}</h6>
                                </div>
                                <div class="card-body">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Recent Order') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="order-wrap h-100" id="orderlistcashinhand">
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#OID72</a>
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#OID67</a>
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#OID60</a>
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#OID48</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">{{ __('Settlement') }}</h6>
                                </div>
                                <div class="card-body">
                                    <div class="order-wrap h-100" id="orderlistcashinhand">
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#SIT1</a>
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#SIT2</a>
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#SIT3</a>
                                        <a class="btn badge badge-success badge-pill mb-1" href="javascript:void();">#SIT4</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footers.auth')
            @include('drivers.partials.modal')
            <script>
                var g_driverid = '{{ $driver->id }}';
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
                        url: '/drivers/driverApprovedStatus/'+g_driverid+'/'+s_status,
                        type: 'get',
                        dataType: 'json',
                        success: function(response){
                            console.log(response);
                            if(response)
                            {
                                alert('Status update successfully');
                            }else{
                                alert('Access denied');
                            }
                        }
                    });
                }                
            </script>
        </div>
    @endsection

