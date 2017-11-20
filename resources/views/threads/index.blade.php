@extends('layouts.default')

@section('page_title', 'Forums')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container forums-container">
        <nav class="breadcrumb has-bullet-separator " aria-label="breadcrumbs">
            <ul>
                <li class="is-active"><a href="/threads">Forums</a></li>
            </ul>
        </nav>

        <div class="columns is- is-marginless is-centered">
            <div class="column column is-3">
                @if (auth()->check())
                    <a class="button is-primary" href="/threads/create">New Thread</a>
                    <br><br>
                @endif
                <aside class="menu">
                    <p class="menu-label">
                        Filter
                    </p>
                    <ul class="menu-list">
                        @if (auth()->check())
                            <li><a href="/threads?by={{ auth()->user()->username }}">My Threads</a></li>
                        @endif
                            <li><a href="/threads?popular=1">Popular Threads</a></li>
                            <li><a href="/threads?unanswered=1">Unanswered Threads</a></li>
                    </ul>
                    <p class="menu-label">
                        Channels
                    </p>
                    <ul class="menu-list">
                        @foreach ($channels as $channel)
                            <li><a class="navbar-item" href="/threads/{{ $channel->slug }}">{{ $channel->name }}</a></li>
                        @endforeach
                    </ul>
                </aside>

                    <div id="code-sponsor-widget"></div>
            </div>

            <div class="column column is-9">
                @include ('threads._list')

                {{ $threads->render() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush