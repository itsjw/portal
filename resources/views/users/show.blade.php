@extends('layouts.default')

@section('page_title', $user->username)

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <section class="hero is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <figure class="image is-128x128">
                    <img class="is-rounded" src="{{ $user->avatar_path }}">
                </figure>
                <h1 class="title">
                    {{ $user->name }}
                </h1>
                <h2 class="subtitle">
                    {{ '@' . $user->username }}
                </h2>
            </div>
        </div>
    </section>

    <div class="container">

    </div>
@endsection

@push('scripts')

@endpush