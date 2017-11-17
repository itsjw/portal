@extends('layouts.default')

@section('page_title', 'Welcome')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <div class="map-wrapper map-responsive">
            <google-map :allusergroups="{{ $usergroups }}"></google-map>
        </div>
    </div>
@endsection

@push('scripts')

@endpush