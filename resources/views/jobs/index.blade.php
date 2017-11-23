@extends('layouts.default')

@section('page_title', 'Jobs')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <section class="hero is-bold is-danger is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">
                    Jobs
                </h1>
                <h2 class="subtitle">
                    Looking for new opportunities? Find the job that fit´s you the most.
                </h2>
                <a class="button is-danger" href="/jobs/create">ADD A JOB</a>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="columns is- is-marginless is-centered">

            <div class="column is-9">
                <div class="box">
                    @forelse($jobs as $job)
                        <div>
                            <article class="media">
                                <div class="media-left">
                                    <figure class="image is-64x64">
                                        <img src="{{ asset('images/avatars/default.png') }}" alt="{{ $job->title }}">
                                    </figure>
                                </div>

                                <div class="media-content">
                                    <div class="content">
                                        <strong>{{ $job->title }}</strong> | <small>{{ $job->category->title }}</small>
                                        <br>
                                        {{ str_limit($job->description, '200') }}
                                    </div>
                                </div>
                            </article>
                            <hr>
                        </div>
                        @empty
                        <p>There are no jobs at the moment. How about <a href="/jobs/create">posting a new job</a>?</p>
                    @endforelse
                </div>
            </div>

            <div class="column is-3">
                <div class="box">
                    hhh
                </div>
            </div>

        </div>
    </div>
@endsection

@push('scripts')

@endpush