@extends('layouts.default')

@section('page_title', 'Edit: ' . $link->title)

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <nav class="breadcrumb has-bullet-separator " aria-label="breadcrumbs">
            <ul>
                <li><a href="/links">Links</a></li>
                <li><a href="/links/{{ $link->id }}">{{ $link->title }}</a></li>
                <li class="is-active"><a href="/links/{{ $link->id }}{{ $link->title }}/edit">Edit Link</a></li>
            </ul>
        </nav>

        <div class="card">
            <div class="card-content">
                <div class="content">
                    <form action="{{ route('links.update', $link) }}" method="patch">
                        {!! csrf_field() !!}
                        <div class="field">
                            <label class="label">Title</label>
                            <div class="control">
                                <input class="input" type="text" name="title" placeholder="Title of your link" value="{{ $link->title }}">

                                @if ($errors->has('title'))
                                    <p class="help is-danger">
                                        {{ $errors->first('title') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">URL</label>
                            <div class="control">
                                <input class="input" type="text" name="url" placeholder="URL of your link" value="{{ $link->url }}">

                                @if ($errors->has('url'))
                                    <p class="help is-danger">
                                        {{ $errors->first('url') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Category</label>
                            <div class="control">
                                <div class="select">
                                    <select name="category_id">
                                        @foreach(\App\Models\LinkCategory::all() as $category)
                                            <option value="{{ $link->category_id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                @if ($errors->has('category_id'))
                                    <p class="help is-danger">
                                        {{ $errors->first('category_id') }}
                                    </p>
                                @endif
                            </div>
                        </div>

                        <div class="field is-grouped">
                            <div class="control">
                                <button type="submit" class="button is-link">Update Link</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush