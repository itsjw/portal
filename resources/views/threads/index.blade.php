@extends('layouts.default')

@section('page_title', 'PageTitle')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @include ('threads._list')
                </div>

                {{ $threads->render() }}
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush