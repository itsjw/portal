@extends('layouts.default')

@section('page_title', 'Create a new Thread')

@push('header_scripts')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/0.11.1/trix.css" />
@endpush

@section('content')
    <div class="container">
        <nav class="breadcrumb has-bullet-separator " aria-label="breadcrumbs">
            <ul>
                <li><a href="/threads">Forums</a></li>
                <li class="is-active"><a href="/threads/create">Create a new Thread</a></li>
            </ul>
        </nav>

        <div class="card">
            <div class="card-content">
                <form method="POST" action="/threads">
                    {{ csrf_field() }}

                    <div class="field">
                        <label class="label">Choose a Channel:</label>
                        <div class="control">
                            <div class="select">
                                <select name="channel_id" id="channel_id" required>
                                    <option value="">Choose One...</option>
                                    @foreach ($channels as $channel)
                                        <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                            {{ $channel->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Title:</label>
                        <input type="text" class="input" id="title" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="field">
                        <label class="label">Body:</label>
                        <trix></trix>
                        <!--<small>Use Markdown with <a href="https://help.github.com/categories/writing-on-github/">GitHub-flavored</a> code blocks.</small>-->
                    </div>

                    <div class="field">
                        <div class="g-recaptcha" data-sitekey="6LfFCjkUAAAAAPQeRxazgYm5fuqOYvqz97bilvZ2"></div>
                    </div>

                    <div class="field">
                        <button class="button">
                            Publish
                        </button>
                    </div>

                    @if (count($errors))
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush