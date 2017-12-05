@extends('layouts.default')

@section('page_title', 'Register')

@push('header_scripts')

@endpush

@push('styles')
    <style>
        ul,
        li {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        li:before {
            content: '\f00c';
            font-family: 'FontAwesome';
            float: left;
            margin-left: -1.5em;
            color: #0074D9;
        }
    </style>
@endpush

@section('content')
    <section class="hero is-bold is-light is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">
                    Register
                </h1>
                <h2 class="subtitle">
                    Wanna become a part of the community? Sign up now and connect to other developers around you.
                </h2>
            </div>
        </div>
    </section>

    <div class="columns is-marginless">
        <div class="column is-three-fifths">
            <div class="box">
                <div class="content">
                    <strong>What is PHPMap?</strong>
                    <br>
                    PHPMap is an interactive map of php-developers worldwide.
                    <br><br>
                    <strong>Features</strong>
                    <br>
                    <ul>
                        <li>Meet other php-developers around you</li>
                        <li>Organize meetups & usergroups in your area</li>
                        <li>Work on projects together</li>
                        <li>Find awesome projects</li>
                        <li>Have a look, who´s next to you</li>
                        <li>Create own articles / tutorials and more</li>
                    </ul>
                    <br>
                    <strong>Can I contribute?</strong>
                    <br>
                    Yes. The source of PHPMap is licensed under the MIT-License available on <a href="https://github.com/PHPMap/portal">GitHub</a>.
                </div>
            </div>
        </div>

        <div class="column">
            <div class="box">

                <div class="">
                    <form class="register-form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <div class="field">
                            <label class="label">Name</label>
                            <p class="control">
                                <input class="input" id="name" type="name" name="name" value="{{ old('name') }}" required autofocus>
                            </p>

                            @if ($errors->has('name'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Username</label>
                            <p class="control">
                                <input class="input" id="text" type="username" name="username" value="{{ old('username') }}" required autofocus>
                            </p>

                            @if ($errors->has('username'))
                                <p class="help is-danger">
                                    {{ $errors->first('username') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">E-mail Address</label>
                            <p class="control">
                                <input class="input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                            </p>

                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Address</label>
                            <p class="control">
                                <input class="input"  type="text" name="address" value="{{ old('address') }}" id="address-input" placeholder="Where do you come from?" required autofocus>
                            </p>

                            @if ($errors->has('address'))
                                <p class="help is-danger">
                                    {{ $errors->first('address') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Password</label>
                            <p class="control">
                                <input class="input" id="password" type="password" name="password" required>
                            </p>

                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label class="label">Confirm Password</label>
                            <p class="control">
                                <input class="input" id="password-confirm" type="password" name="password_confirmation" required>
                            </p>
                        </div>

                        <div class="field">
                            <div class="field-body">
                                <div class="field is-grouped">

                                    <div class="control">
                                        <button type="submit" class="button is-danger">Register</button>
                                    </div>

                                    <div class="control">
                                        <a class="button" href="/auth/social/github">
                                                <span class="icon">
                                                  <i class="fa fa-github"></i>
                                                </span>
                                            <span>Login with GitHub</span>
                                        </a>
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