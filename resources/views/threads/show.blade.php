@extends('layouts.default')

@section('page_title', $thread->title)

@push('header_scripts')

@endpush

@push('styles')
    <link rel="stylesheet" href="/css/vendor/jquery.atwho.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css" />
@endpush

@section('content')
    <thread-view :thread="{{ $thread }}" inline-template>
        <div class="container">
            <nav class="breadcrumb has-bullet-separator " aria-label="breadcrumbs">
                <ul>
                    <li><a href="/threads">Forums</a></li>
                    <li><a href="/threads/{{ $thread->channel->slug }}">{{ $thread->channel->name }}</a></li>
                    <li class="is-active"><a href="/threads/{{ $thread->channel->slug }}/{{ $thread->slug }}">{{ $thread->title }}</a></li>
                </ul>
            </nav>

            <div class="columns">
                <div class="column is-four-fifths" v-cloak>
                    @include ('threads._question')

                    <replies @added="repliesCount++" @removed="repliesCount--"></replies>
                </div>

                <div class="column">
                    <div class="card">
                        <div class="card-content">
                            <p>
                                This thread was published {{ $thread->created_at->diffForHumans() }} by
                                <a href="#">{{ $thread->creator->username }}</a>, and currently has <span v-text="repliesCount"></span> {{ str_plural('comment', $thread->replies_count) }}.
                            </p>
                            <br>
                            <p>
                                <subscribe-button :active="{{ json_encode($thread->isSubscribedTo) }}" v-if="signedIn"></subscribe-button>

                                <button class="button is-small is-danger is-outlined" v-if="authorize('isAdmin')" @click="toggleLock" v-text="locked ? 'Unlock' : 'Lock'"></button>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </thread-view>
@endsection

@push('scripts')

@endpush