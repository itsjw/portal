@extends('layouts.default')

@section('page_title', 'Home')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="map-wrapper map-responsive">
        <google-map :allusers="{{ $users }}" :allusergroups="{{ $usergroups }}"></google-map>
    </div>
    @push('scripts')

@endpush