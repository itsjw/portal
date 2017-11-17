@extends('layouts.default')

@section('page_title', 'Home')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="jumbotron">
        <div class="container p-5">
            <h1 class="display-1">Dashboard</h1>

            <p class="lead ml-2 text-success">
                You are logged in!
            </p>
        </div>
    </div>
@endsection

@push('scripts')

@endpush