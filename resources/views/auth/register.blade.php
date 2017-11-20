@extends('layouts.default')

@section('page_title', 'Register')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Register
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Register</p>
                </header>

                <div class="card-content">
                    <form class="register-form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Name</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="name" type="name" name="name" value="{{ old('name') }}" required autofocus>
                                    </p>

                                    @if ($errors->has('name'))
                                        <p class="help is-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Username</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="text" type="username" name="username" value="{{ old('username') }}" required autofocus>
                                    </p>

                                    @if ($errors->has('username'))
                                        <p class="help is-danger">
                                            {{ $errors->first('username') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">E-mail Address</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Address</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input"  type="text" name="address" value="{{ old('address') }}" id="address-input" placeholder="Where do you come from?" required autofocus>
                                    </p>

                                    @if ($errors->has('address'))
                                        <p class="help is-danger">
                                            {{ $errors->first('address') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password" type="password" name="password" required>
                                    </p>

                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Confirm Password</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password-confirm" type="password" name="password_confirmation" required>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-primary">Register</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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