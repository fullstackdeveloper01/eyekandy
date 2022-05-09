@extends('layouts.app', ['title' => __('Listings Management')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Listings') }}</h3>
                            </div>
                        </div>
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
                        <table class="table align-items-center table-flush" id="listing">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('User Name') }}</th>
                                    <th scope="col">{{ __('Mobile No') }}</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Categories') }}</th>
                                    <th scope="col">{{ __('Sub Categories') }}</th>
                                    <th scope="col">{{ __('Hours of Operation') }}</th>
                                    <th scope="col">{{ __('Contact No- ') }}</th>
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($listing_list)
                                    @foreach($listing_list as $listing)
                                    <tr>
                                        <td><a href="{{ route('users.show', $listing->user_id) }}">{{ $listing->name }}</a></td>
                                        <td>{{ $listing->mobile }}</td>
                                        <td>
                                            <a href="{{ route('listings.show', $listing) }}">
                                                {{ $listing->title }}
                                            </a>
                                        </td>
                                        <td>{{$listing->category}} </td>
                                        @php 
                                        $subcategory = App\Categories::find($listing->subcategory)->name;
                                        @endphp
                                        <td>{{$subcategory}}</td>
                                        <td>{{$listing->business_time}}</td>
                                        <td>{{$listing->phone}}</td>
                                        <td><a href="{{route('user.review',$listing->id)}}" class="btn btn-sm btn-primary" >Review</a></td>
                                    </tr>
                                   
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                   
                </div>
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection