@extends('layouts.app', ['title' => __('Event Details')])

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
            content: '';
            left: -5rem;
        }
        .btn-toggle:after {
            content: '';
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
            <a href="javascript:history.back()" class="btn btn-primary btn-md mr">Back</a>
        </div>
    </div>
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12">
                <br />
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0 bg-yellow-fade br-6 bordered">
                        <div class="row form-group">
                            <div class="col-12">
                                <h4 class="mb-0">{{--App\Helpers\Helper::userName($event->user_id)--}}</h4>
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-4">
                                <small>PARTY Type</small>
                                <h4 class="mb-0">{{ App\Helpers\Helper::PartyName($event->party_type) }}</h4>
                            </div>                                                                 
                            <div class="col-4">
                                <small>PACKAGE</small>
                                <h4 class="mb-0">{{ App\Helpers\Helper::packageName($event->show_type) }}</h4>
                            </div>
                            <div class="col-4">
                                <small>VENUE</small>
                                <h4 class="mb-0">{{ App\Helpers\Helper::venueName($event->venue_type) }}</h4>
                            </div>                                                                 
                            <div class="col-4">
                                <small>Party Date</small>
                                <h4 class="mb-0">{{($event->party_date) }}</h4>
                            </div>
                            <div class="col-4">
                                <small>Party TIME</small>
                                <h4 class="mb-0">{{ App\Helpers\Helper::getTime($event->party_time) }}</h4>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-6">
                            </div>                                                                 
                        </div>
                    </div>
                </div>
                <br />
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h6 class="heading-small text-muted mb-0">About User</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <small>Name</small>
                                <h4 class="mb-0">{{ $event->name }}</h4>
                            </div>                                                                 
                            <div class="col-4">
                                <small>Phone</small>
                                <h4 class="mb-0">{{$event->phone}}</h4>
                            </div>
                            <div class="col-4">
                                <small>Email</small>
                                <h4 class="mb-0">{{$event->email}}</h4>
                            </div>                                                                 
                        </div>
                    </div>
                </div>
                <br />
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h6 class="heading-small text-muted mb-0">Package Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <small>Package Title</small>
                                <h4 class="mb-0">{{ $package->package_title }}</h4>
                            </div>                                                                 
                            <div class="col-4">
                                <small>Description</small>
                                <h4 class="mb-0">{{$package->package_description}}</h4>
                            </div>
                            <div class="col-4">
                                <small>Entertainers</small>
                                <h4 class="mb-0">{{$package->package_entertainer}}</h4>
                            </div>
                            
                            <div class="col-4">
                                <small>Price</small>
                                <h4 class="mb-0">{{ $package->package_price }}</h4>
                            </div>                                                                 
                            <div class="col-4">
                                <small>Extra Price (per/hours)</small>
                                <h4 class="mb-0">{{$package->extra_hour_price}}</h4>
                            </div>
                            <div class="col-4">
                                <small>Hours</small>
                                <h4 class="mb-0">{{$package->package_hours}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h6 class="heading-small text-muted mb-0">Address Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <small>Venue Address</small>
                                <h4 class="mb-0">{{ $event->venue_address }}</h4>
                            </div>                                                                 
                            <div class="col-4">
                                <small>Venue City</small>
                                <h4 class="mb-0">{{App\Helpers\Helper::cityName($event->venue_city)}}</h4>
                            </div>
                            <div class="col-4">
                                <small>Venue Zipcode</small>
                                <h4 class="mb-0">{{$event->venue_zipcode}}</h4>
                            </div>                                                                 
                        </div>
                    </div>
                </div>
                <br />
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h6 class="heading-small text-muted mb-0">Girls Details</h6>
                    </div>
                    @php
                        $girlsTd =explode(',',$event->girl_id);
                        $girl_library=[];
                    @endphp
                    <div class="card-body">
                    <div class="row">
                            <div class="col-4">
                                <small>Image</small>
                            </div>                                                                 
                            <div class="col-4">
                                <small>Name</small>
                            </div>
                            <div class="col-4">
                                <small>Country</small>
                            </div>                                                                 
                        </div>
                        @foreach($girlsTd as $val)
                        @php 
                            $girl_details = App\Girls::where('id','=',$val)->first();
                            $girl_img = explode(',',$girl_details->image);
                            foreach($girl_img as $img_g){
                                $girl_library[]=$img_g;
                            }
                        @endphp
                        <div class="row">
                            <div class="col-4">
                                <h4 class="mb-0"><img class="image" width="80xp" height="80px" data-toggle="modal" data-target="#imageModal" src="{{ url('/uploads/girls').'/'.$girl_img[0]}}" width="40px" height="40px"></h4>
                            </div>                                                                 
                            <div class="col-4">
                                <h4 class="mb-0">{{ $girl_details->full_name }}</h4>
                            </div>
                            <div class="col-4">
                                <h4 class="mb-0">{{ App\Helpers\Helper::countryName($girl_details->country_id) }}</h4>
                            </div>                                                                 
                        </div><br>
                        @endforeach
                    </div>
                </div>
                <br />
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h6 class="heading-small text-muted mb-0">Girls Images</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                @foreach($girl_library as $library)
                                    <img class="image" width="80xp" height="80px" data-toggle="modal" data-target="#imageModal" src="{{url('uploads/girls/'.$library)}}" width="40px" height="40px">
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <div class="card card-profile shadow">
                    <div class="card-header">
                        <h6 class="heading-small text-muted mb-0">Payment Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4">
                                <small>Transaction Id</small>
                                <h4 class="mb-0">{{ $transaction->transaction_id }}</h4>
                            </div>                                                                 
                            <div class="col-4">
                                <small>Status</small>
                                <h4 class="mb-0">{{ $transaction->transaction_status }}</h4>
                            </div>
                            <div class="col-4">
                                <small>Amount</small>
                                <h4 class="mb-0">{{ $transaction->amount }}</h4>
                            </div>                                                                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">                   
            </div>
        </footer>
        <div class="modal fade modal-xl" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
            <div class="modal-dialog modal-l modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title" id="modal-title-driver">Image</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="image_row"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

