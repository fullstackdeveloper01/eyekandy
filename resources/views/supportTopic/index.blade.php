@extends('layouts.app', ['title' => __('Support Topic')])

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
                                <h3 class="mb-0">{{ __('Support Topic List') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('support_topic.create') }}" class="btn btn-sm btn-primary">{{ __('Add Topic') }}</a>
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
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($supportTopic as $key => $supportTopics)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $supportTopics->topic }}</td>
                                        <td>
                                            @if($supportTopics->active==1)
                                            {{'Active'}}
                                            @else
                                            {{'Inactive'}}
                                            @endif
                                        </td>
                                        <td class="text-right d-flex align-items-center v-align-text-bottom">
                                            <a class="btn btn-warning btn-sm" href="{{ route('support_topic.edit', $supportTopics) }}">{{ __('Edit') }}</a>
                                            <form action="{{ route('support_topic.destroy', $supportTopics) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                @if($supportTopics->active==1)
                                                <button type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to Inactive this support topic?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Inactive') }}
                                                </button>
                                                @else
                                                <button type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to Active this support topic?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Active') }}
                                                </button>
                                                @endif
                                                
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        @if(count($supportTopic))
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $supportTopic->appends(Request::all())->links() }}
                            </nav>
                        @else
                            <h4>{{ __('You don`t have any Support Topic') }} ...</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
