@extends('layouts.default')

@section('page_title', 'Reset Password')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <section class="hero is-bold is-light is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">
                    Reset Password
                </h1>
            </div>
        </div>
    </section>


    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="box">
                @if (session('status'))
                    <div class="notification is-info">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="password-reset-form" method="POST" action="{{ route('password.request') }}">

                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">


                    <div class="field is-horizontal">
                        <div class="field-label">
                            <label class="label">E-Mail Address</label>
                        </div>

                        <div class="field-body">
                            <div class="field">
                                <p class="control">
                                    <input class="input" id="email" type="email" name="email"
                                           value="{{ old('email') }}" required autofocus>
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
                                    <button type="submit" class="button is-danger">Reset Password </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush