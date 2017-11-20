<reply :attributes="{{ $reply }}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card">

        <div class="card-content" v-if="editing">
            <div>
                <div class="field">
                    <div class="control">
                        <textarea class="textarea" v-model="body"></textarea>
                    </div>
                </div>

                <button class="button is-small" @click="update">Update</button>
                <button class="button is-small" @click="editing = false">Cancel</button>
            </div>
        </div>

        <div class="card-content" v-if="! editing">
            <article class="media">
                <figure class="media-left">
                    <p class="image is-64x64">
                        <img src="h{{ $reply->owner->avatar_path }}" alt="{{ $reply->owner->username }}">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                        <a href="{{ '/@' . $reply->owner->username }}">
                            <strong>{{ $reply->owner->name }}</strong> <small>{{ '@' . $reply->owner->username }}</small> <small>{{ $reply->created_at->diffForHumans() }}</small>
                            <br>
                            <vue-markdown v-html="body"></vue-markdown>
                        </a>
                    </div>
                    <nav class="level is-mobile">
                        <div class="level-left">
                            <a class="level-item">
                                <span class="icon is-small"><i class="fa fa-reply"></i></span>
                            </a>
                            <a class="level-item">
                                <span class="icon is-small"><i class="fa fa-retweet"></i></span>
                            </a>

                            @if (Auth::check())
                                <a class="level-item">
                                    <favorite :reply="{{ $reply }}"></favorite>
                                </a>
                            @endif
                        </div>
                    </nav>
                </div>
                <div class="media-right">
                    <button class="delete"></button>
                    @can ('update', $reply)
                        <div class="card-footer level">
                            <button class="button is-small" @click="editing = true">Edit</button>
                            <button class="delete" @click="destroy">Delete</button>
                        </div>
                    @endcan
                </div>
            </article>
        </div>

        @can ('update', $reply)
            <div class="card-footer level">
                <button class="button is-small" @click="editing = true">Edit</button>
                <button class="button is-danger is-outlined is-small" @click="destroy">Delete</button>
            </div>
        @endcan
    </div>
</reply>