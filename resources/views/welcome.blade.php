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

    <div class="container">
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

            <div class="level-item has-text-centered">
                <div>
                    <p class="heading"><a href="/jobs">Jobs</a></p>
                    <p class="title">{{ \App\Models\Job::count() }}</p>
                </div>
            </div>
        </nav>


        <div class="container">
            <div class="columns">

            </div>
        </div>

    </div>
@endsection

@push('scripts')

@endpush