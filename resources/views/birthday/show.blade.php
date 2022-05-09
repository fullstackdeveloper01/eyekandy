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
                <button type="button" class="btn btn-primary btn-md mr">Back</button>
            </div>
        </div>
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-9">
                    <br />
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0 bg-yellow-fade br-6 bordered">
                            <div class="row">
                                <div class="col-3">
                                    <h4 class="mb-0">Pavan Sharma</h4>
                                    <h5 class="mb-0">#SHM01</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Last Login</h4>
                                    <h5>26 Oct 2021 14:18</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Package</h4>
                                    <h5 class="mb-0">NA</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Mobile Number</h4>
                                    <h5 class="mb-0">9999933456</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Email</h4>
                                    <h5 class="mb-0">pavan@gmail.com</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Date of birth</h4>
                                    <h5 class="mb-0">11-10-1987</h5>
                                </div>
                                <div class="col-3">
                                    <h4 class="mb-0">Joining Date</h4>
                                    <h5>26 Oct 2021 14:18</h5>
                                </div>                                                                          
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card card-profile shadow">
                        <div class="card-header">
                            <h6 class="heading-small text-muted mb-0">Business information</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <p>
                                        SQC Certifiation is a technology platform to simply legal and business related matters. We are committed to helping strartups and small business owners in solving legal compliance related to starting and running their business.

                                        Our mission is to offer affordable, quick and automated professional services to clients. Through Technology, we bring numerous government / legal forms at one place and have simplified them to be fully understood by common man.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">Listing</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">{{ __('Title') }}</th>
                                                    <th scope="col">{{ __('Category') }}</th>
                                                    <th scope="col">{{ __('Sub Category') }}</th>
                                                    <th scope="col">{{ __('Contact') }}</th>
                                                    <th scope="col">{{ __('Open Time') }}</th>
                                                    <th scope="col">{{ __('Files') }}</th>
                                                    <th scope="col">{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="{{ url('listing/detail') }}" style="white-space: nowrap;">
                                                            {{ __('Low Cost ISO For Business') }}
                                                        </a>
                                                    </td>
                                                    <td style="white-space: nowrap;">{{ __('Business & Services') }}</td>
                                                    <td style="white-space: nowrap;">{{ __('Certification Consultants ,Auditors ') }}</td>
                                                    <td style="white-space: nowrap;">{{ __('+91-9009789123, 0731-253123') }}</td>
                                                    <td>{{ __('08 AM to 7 PM') }}</td>
                                                    <td>
                                                        <img src="https://cdn3.iconfinder.com/data/icons/aami-web-internet/64/aami4-46-128.png" width="40px" height="40px">
                                                        <img src="https://cdn3.iconfinder.com/data/icons/aami-web-internet/64/aami4-46-128.png" width="40px" height="40px"><br>
                                                        <img src="https://cdn3.iconfinder.com/data/icons/aami-web-internet/64/aami4-46-128.png" width="40px" height="40px">
                                                        <img src="https://cdn3.iconfinder.com/data/icons/aami-web-internet/64/aami4-46-128.png" width="40px" height="40px">
                                                    </td>
                                                    <td> 
                                                        <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" id="driverSettlementStatus" aria-pressed="true" autocomplete="off">
                                                            <div class="handle"></div>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 mb-5 mb-xl-0">
                    <br />
                    <div class="card card-profile shadow text-center">
                        <div class="card-header">
                            <button type="button" class="btn btn-sm btn-toggle active" data-toggle="button" id="driverSettlementStatus" aria-pressed="true" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                        </div>
                    </div>
                    <br />
                    <div class="card card-profile shadow">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-header">
                                    <h6 class="heading-small text-muted mb-0">Total Listing</h6>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <i class="ni ni-money-coins text-orange mr-2"></i>
                                        <h4 class="mb-0">01</h4>
                                    </div>
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

