@extends('layouts.default')

@section('page_title', 'Link Categories')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <div class="content">
            <pre>{{ $categories }}</pre>
        </div>
    </div>
@endsection

@push('scripts')

@endpush