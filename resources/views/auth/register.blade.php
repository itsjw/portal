@extends('layouts.default')

@section('page_title', 'Register')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title text-center">Register</h4>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>

                                <div class="col-md-12">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                    @if ($errors->has('name'))
                                        <span class="form-text text-muted">
                                            {{ $errors->first('name') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">E-Mail Address</label>

                                <div class="col-md-12">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                    @if ($errors->has('email'))
                                        <span class="form-text text-muted">
                                            {{ $errors->first('email') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Address</label>

                                <div class="col-md-12">
                                    <input type="search" class="form-control" id="address-input" placeholder="Where are we going?" />

                                    @if ($errors->has('address'))
                                        <span class="form-text text-muted">
                                            {{ $errors->first('address') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Password</label>

                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password">

                                    @if ($errors->has('password'))
                                        <span class="form-text text-muted">
                                            {{ $errors->first('password') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Confirm Password</label>

                                <div class="col-md-12">
                                    <input type="password" class="form-control" name="password_confirmation">

                                    @if ($errors->has('password_confirmation'))
                                        <span class="form-text text-muted">
                                            {{ $errors->first('password_confirmation') }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var placesAutocomplete = places({
            container: document.querySelector('#address-input'),
        });
        var updateLatLng = function(e) {
            $('<input>').attr({
                type: 'hidden',
                id: 'lat',
                name: 'lat',
                value: e.suggestion['latlng']['lat']
            }).appendTo('form');
            $('<input>').attr({
                type: 'hidden',
                id: 'lng',
                name: 'lng',
                value: e.suggestion['latlng']['lng']
            }).appendTo('form');
            $('<input>').attr({
                type: 'hidden',
                id: 'city',
                name: 'city',
                value: e.suggestion['name']
            }).appendTo('form');
            $('<input>').attr({
                type: 'hidden',
                id: 'country',
                name: 'country',
                value: e.suggestion['country']
            }).appendTo('form');
        };
        placesAutocomplete.on('change', function(e) {
            updateLatLng(e);
            console.log(e.suggestion);
        });
    </script>
@endpush