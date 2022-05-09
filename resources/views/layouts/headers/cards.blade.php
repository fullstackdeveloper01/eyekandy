<style>
    .c-view-all{
        text-align: center;
        padding-top: inherit;
    }
</style>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

    <div class="container-fluid">

        <div class="header-body">

            <!-- Card stats -->

            <div class="row">

                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0  mh-120">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __(' Total User') }}</h5>

                                    <span class="h3 font-weight-bold mb-0">{{$total_user}}</span>

                                    

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">

                                        <i class="fas fa-users"></i>

                                    </div>

                                </div>

                            </div>

                            <div class="c-view-all">
                                <a href="{{ route('user.index') }}">View All</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0  mh-120">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('This Months User') }} </h5>

                                    <span class="h3 font-weight-bold mb-0">{{$thismonth_user}}</span>                                    

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">

                                        <i class="fas fa-user"></i>

                                    </div>

                                </div>

                            </div>

                            <div class="c-view-all">
                                <a href="{{ route('user.index') }}">View All</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0  mh-120">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('Total Event') }}</h5>

                                    <span class="h3 font-weight-bold mb-0">{{$total_event}}</span>

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">

                                        <i class="fas fa-calendar"></i>

                                    </div>

                                </div>

                            </div>

                            <div class="c-view-all">
                                <a href="{{ route('event.index') }}">View All</a>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-xl-3 col-lg-6">

                    <div class="card card-stats mb-4 mb-xl-0  mh-120">

                        <div class="card-body">

                            <div class="row">

                                <div class="col">

                                    <h5 class="card-title text-uppercase text-muted mb-0">{{ __('This Month Event') }}</h5>

                                    <span class="h3 font-weight-bold mb-0">{{$thismonth_event}}</span>

                                </div>

                                <div class="col-auto">

                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">

                                        <i class="fas fa-calendar"></i>

                                    </div>

                                </div>

                            </div>
                            <div class="c-view-all">
                                <a href="{{ route('event.index') }}">View All</a>
                            </div>


                        </div>

                    </div>

                </div>

            </div>

               

            <br/>

        </div>

    </div>

</div>

