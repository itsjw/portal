@extends('layouts.default')

@section('page_title', 'Home')

@push('header_scripts')
    <script src="https://js.stripe.com/v3/"></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css"
          integrity="sha512-M2wvCLH6DSRazYeZRIm1JnYyh22purTM+FDB5CsyxtQJYeKq83arPe5wgbNmcFXGqiSH2XR8dT/fJISVA1r/zQ=="
          crossorigin=""/>
@endpush

@section('content')
    <php-map></php-map>
    {{--<small-ad></small-ad>--}}

    <div class="container">
        <div class="has-text-centered">
            <p class="title">Statistics</p>
            <br>
        </div>

        <nav class="level is-mobile">
            <div class="level-item has-text-centered">
                <div>
                    <p class="heading"><a href="/users">Users</a></p>
                    <p class="title">{{ \App\Models\User::count() }}</p>
                </div>
            </div>

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading"><a href="/threads">Threads</a></p>
                    <p class="title">{{ \App\Models\Thread::count() }}</p>
                </div>
            </div>

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading"><a href="/links">Links</a></p>
                    <p class="title">{{ \App\Models\Link::count() }}</p>
                </div>
            </div>

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading"><a href="/meetups">Meetups</a></p>
                    <p class="title">{{ \App\Models\Meetup::count() }}</p>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="columns">
            <div class="column">
                <div class="box">
                    <strong>PHPMap</strong> allows you to easily find and collaborate with other php developers in your area. Connect and work with others on the next big thing!
                </div>
            </div>

            <div class="column">
                <div class="box">
                    <strong>Developers <span class="red"><i class="fa fa-heart" aria-hidden="true"></i></span> markdown!</strong> Write your articles in markdown and share them with others. You can also export and use them on sites like GitHub and other sites/apps that support .md files.
                </div>
            </div>

            <div class="column">
                <div class="box">
                    <strong>Find</strong> other developers in your area and connect with them. Organize meetups, work on projects and make friends. Maybe you will also find your new job!
                </div>
            </div>

            <div class="column">
                <div class="box">
                   <strong>Learn</strong> from other developers on PHPMap! As a developer, you will never stop learning. Find developers around you and learn from the best.
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @foreach(\App\Models\User::latest()->take(5) as $user)

        @endforeach
    </div>
@endsection

@push('scripts')

@endpush