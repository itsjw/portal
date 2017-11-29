@extends('layouts.default')

@section('page_title', 'Links')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <section class="hero is-bold is-danger is-small">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-1">
                    Links
                </h1>
                <h2 class="subtitle">
                    Every day the PHP community creates awesome tutorials and packages and this section allows anyone to submit their work.
                </h2>
                <a class="button is-danger" href="/links/create">ADD A LINK</a>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="columns is-multiline is-mobile">
            @forelse($links as $link)
                <div class="column is-4">
                    <div class="box">
                        <p class="subtitle is-7"><small>{{ $link->category->title }}</small> / <small>{{ $link->created_at->diffForHumans() }}</small></p>
                        <p class="title is-4">
                            <a href="{{ $link->url }}?utm_source=phpmap">{{ $link->title }}</a>
                        </p>
                        <small>Added by {{ $link->author->username }}</small>
                    </div>
                </div>
            @empty
                <p>There are no relevant results at this time.</p>
            @endforelse

            <div class="container">
                @if ($links->hasPages())
                    <nav class="level">

                    </nav>
                    <nav class="pagination is-small has-text-centered" role="navigation" aria-label="pagination">
                        <a href="{{ $links->previousPageUrl() }}"
                           class="pagination-previous {{ $links->onFirstPage() ? 'is-disabled': '' }}">
                            Previous
                        </a>

                        <a href="{{ $links->nextPageUrl() }}"
                           class="pagination-next {{ !$links->hasMorePages() ? 'is-disabled': '' }}">
                            Next
                        </a>

                        <ul class="pagination-list">
                            @foreach ($links as $element)

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
    </div>
@endsection

@push('scripts')

@endpush