<ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="ni ni-tv-2 text-pink"></i> {{ __('Dashboard') }}
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/user">
            <i class="ni ni-single-02 text-pink"></i> {{ __('Users List') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('event.index') }}">
            <i class="ni ni-bullet-list-67 text-pink"></i> {{ __('Event List') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('girls.index') }}">
            <i class="ni ni-image text-pink"></i> {{ __('Girls List') }}
        </a>
    </li>

    <!-- <li class="nav-item">
        <a class="nav-link" href="{{ route('event.index') }}">
            <i class="ni ni-notification-70 text-pink"></i> {{ __('Events') }}
        </a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('birthday') }}">
            <i class="ni ni-chart-pie-35 text-blue" aria-hidden="true"></i> {{ __('Birthdays ') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('package.index') }}">
            <i class="fa fa-archive text-purple" aria-hidden="true"></i> {{ __('Packages') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('advertisement.index') }}">
            <i class="fa fa-archive text-purple" aria-hidden="true"></i> {{ __('Advertisement') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('advertisement.requested') }}">
            <i class="fas fa-ad text-purple" aria-hidden="true"></i> {{ __('Requested Ads') }}
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('darshan.index') }}">
            <i class="fa fa-link text-orange" aria-hidden="true"></i> {{ __('Darshan') }}
        </a>
    </li> -->

    <!-- <li class="nav-item">
        <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
            <i class="fa fa-mobile text-orange"></i>
            <span class="nav-link-text">{{ __('Mobile App') }}</span>
        </a> -->

        <!-- <div class="collapse" id="navbar-examples"> -->
            <!--<a class="nav-link custom-padding" href="#navbar-Settings" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-Settings">
                <i class="fa fa-cogs text-blue"></i>
                <span class="nav-link-text">{{ __('App Settings') }}</span>
            </a>
            <div class="collapse" id="navbar-Settings">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('App Name') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('App Version') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('Admin Version') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('App Icon') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('Splash Screen') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('Main Color') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('Font') }}
                        </a>
                    </li>
                </ul>
            </div>-->
            <!-- <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link custom-pad" href="{{ route('appSettings.index') }}">
                        <i class="fa fa-cogs text-blue" aria-hidden="true"></i> {{ __('App Settings') }}
                    </a>
                </li>
            </ul>
            <a class="nav-link custom-padding" href="#navbar-Sidebar" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-Sidebar">
                <i class="fa fa-bars text-purple"></i>
                <span class="nav-link-text">{{ __('Sidebar') }}</span>
            </a>
            <div class="collapse" id="navbar-Sidebar">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('Color') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">
                            {{ __('BG Images ') }}
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link custom-pad" href="javascript:void(0);">
                        <i class="fa fa-tag text-purple" aria-hidden="true"></i> {{ __('App Menus') }}
                    </a>
                </li>
            </ul>
            <a class="nav-link custom-padding" href="#navbar-Static-Menus" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-Static-Menus">
                <i class="fa fa-th-list"></i>
                <span class="nav-link-text">{{ __('Static Pages') }}</span>
            </a>
            <div class="collapse" id="navbar-Static-Menus">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('customerSupport.index') }}">
                            {{ __('Customer Support') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutUs.index') }}">
                            {{ __('About Us') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('termsCondition.index') }}">
                            {{ __('Terms of Services') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('policy.index') }}">
                            {{ __('Policy') }}
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link custom-pad" href="javascript:void(0);">
                        <i class="fa fa-tag text-purple" aria-hidden="true"></i> {{ __('Rate Us') }}
                    </a>
                </li>
            </ul>
            {{--
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">
                        {{ __('Splash Screen') }}
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">
                        {{ __('About Us') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">
                        {{ __('Team and condition') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">
                        {{ __('PopUp Notification') }}
                    </a>
                </li>
               
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);">
                        {{ __('Push Notification') }}
                    </a>
                </li>
            </ul>
            --}}
        </div>
    </li> -->
    <!--<li class="nav-item">
        <a class="nav-link" href="#navbar-Setting" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-Setting">
            <i class="fa fa-cog text-pink"></i>
            <span class="nav-link-text">{{ __('App Setting') }}</span>
        </a>

        <div class="collapse" id="navbar-Setting">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0)">
                        {{ __('Splash Screen') }}
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ __('Intro Screen') }}
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ __('Payment Gateway') }}
                    </a>
                </li>   
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ __('Modules') }}
                    </a>
                </li> 
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        {{ __('App') }}
                    </a>
                </li>   
          </ul>
        </div>
    </li>-->
    <li class="nav-item">
        <a class="nav-link" href="#navbar-Master" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-Master">
            <i class="ni ni-hat-3 text-pink"></i>
            <span class="nav-link-text">{{ __('Master') }}</span>
        </a>
        <div class="collapse show" id="navbar-Master">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('country.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Country List') }}
                    </a>
                </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('state.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('State List') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('city.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('City List') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('package.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Packages') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('faq.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __("FAQ's") }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('hour.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Hour Time') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('party.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Party Type') }}
                    </a>
                </li>     
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('venue.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Venue') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('termsCondition.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Terms & Condition') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('aboutUs.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('About Us') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('policy.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Privacy Policy') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('customerSupport.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Contact Support') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('support_topic.index') }}">
                        <img src="{{url('/uploads/settings/more.png')}}" class="img-fluid w-10 mr-2"> {{ __('Support Topic') }}
                    </a>
                </li>
                
          </ul>
        </div>
    </li>
    
</ul>
