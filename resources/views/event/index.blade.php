@extends('layouts.app', ['title' => __('Event')])

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
                                <h3 class="mb-0">{{ __('Event') }}</h3>
                            </div>
                            <!-- <div class="col-4 text-right">
                                <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary">{{ __('Add Event') }}</a>
                            </div> -->
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
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('S.No') }}</th>
                                    <th scope="col">{{ __('User Name') }}</th>
                                    <th scope="col">{{ __('City') }}</th>
                                    <th scope="col">{{ __('Package type') }}</th>
                                    <th scope="col">{{ __('Hours') }}</th>
                                    <th scope="col">{{ __('Timing') }}</th>
                                    <th scope="col">{{ __('Party Type') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $key=> $event)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ App\Helpers\Helper::userName($event->user_id) }}</td>
                                        <td>{{ App\Helpers\Helper::cityName($event->venue_city) }}</td>
                                        <td>{{ App\Helpers\Helper::packageName($event->show_type) }}</td>
                                        <td>{{ App\Helpers\Helper::packageTime($event->show_type) }}</td>
                                        <td>{{ App\Helpers\Helper::getTime($event->party_time) }}</td>
                                        <td>{{ App\Helpers\Helper::PartyName($event->party_type) }}</td>
                                        <td>
                                            @if($event->event_status==0)
                                            {{'Pending'}}
                                            @elseif($event->event_status==1)
                                            {{'Complete'}}
                                            @else
                                            {{'Rejected'}}
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a class="btn btn-info btn-sm" href="{{ route('event.show', $event) }}">{{ __('View Details') }}</a>
                                            <!-- <form action="{{ route('event.destroy', $event) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <a class="dropdown-item" href="{{ route('event.edit', $event) }}">{{ __('Edit') }}</a>
                                                @if($event->status==1)
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to deactivate this event?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Deactivate') }}
                                                </button>
                                                @else
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to activate this event?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Activate') }}
                                                </button>
                                                @endif
                                            </form> -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        @if(count($events))
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $events->appends(Request::all())->links() }}
                            </nav>
                        @else
                            <h4>{{ __('You don`t have any event') }} ...</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
