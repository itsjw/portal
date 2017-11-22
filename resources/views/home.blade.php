@extends('layouts.default')

@section('page_title', 'Feed')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <div class="columns is- is-marginless is-centered">
            <div class="column">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Dashboard
                        </p>
                    </header>

                    <div class="card-content">
                        You are logged in!
                    </div>
                </nav>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush