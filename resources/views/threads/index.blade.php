@extends('layouts.default')

@section('page_title', 'PageTitle')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <div class="columns is- is-marginless is-centered">
            <div class="column">
                <div class="columns">
                    @include ('threads._list')
                </div>

                {{ $threads->render() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush