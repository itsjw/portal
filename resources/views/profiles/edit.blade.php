@extends('layouts.default')

@section('page_title', 'PageTitle')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <section class="hero is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <figure class="image is-rounded is-128x128">
                    <img src="{{ $profileUser->avatar_path }}">
                </figure>
                <h1 class="title">
                    {{ $profileUser->name }}
                </h1>
                <h2 class="subtitle">
                    {{ '@' . $profileUser->username }}
                </h2>
            </div>
        </div>
    </section>

    <div class="container">


        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">
                        <avatar-form :user="{{ $profileUser }}"></avatar-form>
                    </div>
                </div>

                @forelse ($activities as $date => $activity)
                    <h3 class="page-header">{{ $date }}</h3>

                    @foreach ($activity as $record)
                        @if (view()->exists("profiles.activities.{$record->type}"))
                            @include ("profiles.activities.{$record->type}", ['activity' => $record])
                        @endif
                    @endforeach
                @empty
                    <p>There is no activity for this user yet.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush