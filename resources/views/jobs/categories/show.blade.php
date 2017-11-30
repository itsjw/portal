@extends('layouts.default')

@section('page_title', $category->title)

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

        <div class="hero-foot">
            <nav class="tabs is-boxed is-fullwidth">
                <div class="container">
                    <ul>
                        <li>
                            <a href="/jobs">All Jobs</a>
                        </li>

                        @foreach(\App\Models\JobCategory::all() as $jobcategory)
                            <li>
                                <a href="/job-category/{{ $jobcategory->slug }}">{{ $jobcategory->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </nav>
        </div>
    </section>

    <div class="container">
        <div class="columns is-marginless is-centered">

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
                                        <div class="columns">
                                            <div class="column">
                                                <strong>{{ $job->title }}</strong>
                                                <br>
                                                at <strong>{{ $job->company->name }}</strong> - {{ $job->company->city }}, {{ $job->company->country }}
                                            </div>

                                            <div class="column">
                                                | <small>{{ $job->category->title }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <hr>
                        </div>
                    @empty
                        <p>There are no jobs at the moment. How about <a href="/jobs/create">posting a new job</a>?</p>
                    @endforelse
                </div>

                <div class="container is-centered">
                    @if ($jobs->hasPages())
                        <nav class="level">

                        </nav>
                        <nav class="pagination is-small has-text-centered" role="navigation" aria-label="pagination">
                            <a href="{{ $jobs->previousPageUrl() }}"
                               class="pagination-previous {{ $jobs->onFirstPage() ? 'is-disabled': '' }}">
                                Previous
                            </a>

                            <a href="{{ $jobs->nextPageUrl() }}"
                               class="pagination-next {{ !$jobs->hasMorePages() ? 'is-disabled': '' }}">
                                Next
                            </a>

                            <ul class="pagination-list">
                                @foreach ($jobs as $element)

                                    @if (is_string($element))
                                        <li><span class="pagination-ellipsis">&hellip;</span></li>
                                    @endif

                                    @if (is_array($element))
                                        @foreach ($element as $page => $url)
                                            <li>
                                                <a href="{{ $url }}"
                                                   class="pagination-link {{ $page == $paginator->currentPage() ? 'is-current' : '' }}">
                                                    {{ $page }}
                                                </a>
                                            </li>
                                        @endforeach
                                    @endif
                                @endforeach
                            </ul>
                        </nav>

                    @endif
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