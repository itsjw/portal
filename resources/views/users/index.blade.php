@extends('layouts.default')

@section('page_title', 'Users')

@push('header_scripts')

@endpush

@push('styles')

@endpush

@section('content')
    <div class="container">
        <ais-index
                app-id="{{ config('scout.algolia.id') }}"
                api-key="{{ env('ALGOLIA_SEARCH_ONLY') }}"
                index-name="users"
                query="{{ request('q') }}"
        >
            <ais-search-box>
                <ais-input placeholder="Find a user..." :autofocus="true" class="input" type="text"></ais-input>
            </ais-search-box>
            <div class="pull-right sp">
                <ais-powered-by></ais-powered-by>
            </div>

            <div class="push"></div>

            <ais-results inline-template class="columns">

                <div class="column is-3" v-for="result in results" :key="result.objectID">
                    <a :href="'@' + result.username">
                        <div class="card">
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                        <figure class="image is-48x48">
                                            <img :src="result.avatar_path" alt="Placeholder image">
                                        </figure>
                                    </div>
                                    <div class="media-content">
                                        <p class="title is-8">@{{ result.name }}</p>
                                        <p class="subtitle is-8">@{{ '@' + result.username }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </ais-results>

            <!--<ais-results>

                <div class="columns">
                    <template scope="{ result }">
                        <div class="column is-one-quarter">
                            <a :href="'@' + result.username">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="media">
                                            <div class="media-left">
                                                <figure class="image is-48x48">
                                                    <img :src="result.avatar_path" alt="Placeholder image">
                                                </figure>
                                            </div>
                                            <div class="media-content">
                                                <p class="title is-8">@{{ result.name }}</p>
                                                <p class="subtitle is-8">@{{ '@' + result.username }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </template>
                </div>

            </ais-results>-->

            <ais-no-results>
                <template slot-scope="props">
                    No products found for <i>@{{ props.query }}</i>.
                </template>
            </ais-no-results>

            <div class="select is-small">
            <ais-results-per-page-selector :options="[20, 50, 100]" class=""></ais-results-per-page-selector>
            </div>
        </ais-index>
    </div>
@endsection

@push('scripts')

@endpush