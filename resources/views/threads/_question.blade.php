<div class="tile" v-if="editing">
    <div class="card">
        <div class="card-content">
            <div class="level">
                <input type="text" class="input" v-model="form.title">
            </div>
        </div>

        <div class="content">
            <div class="field">
                <div class="control">
                    <textarea class="textarea" rows="10" v-model="form.body"></textarea>
                </div>
            </div>
        </div>

        <div class="card-content">
            <button class="button is-small" @click="update">Update</button>
            <button class="button is-small" @click="resetForm">Cancel</button>
        </div>
    </div>
</div>

<div class="tile" v-if="! editing">
    <div class="card">
        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img src="{{ $thread->creator->avatar_path }}" alt="Placeholder image">
                    </figure>
                </div>
                <div class="media-content">
                    <p class="title is-4">
                        <a href="{{ '/@' . $thread->creator->username }}">{{ $thread->creator->username }}</a> posted: <span v-text="title"></span>
                </div>
            </div>
        </div>

        <div class="card-content">
            <vue-markdown>{{ $thread->body }}</vue-markdown>

            @can ('update', $thread)
                <hr>
                <nav class="level is-mobile">
                    <div class="level-left">
                        <button class="button is-small" @click="editing = true" v-show="! editing">Edit</button> &nbsp;
                        <form action="{{ $thread->path() }}" method="POST" class="ml-a">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="button is-small">Delete Thread</button>
                        </form>
                    </div>
                </nav>
            @endcan

        </div>
    </div>
</div>

<div class="tile" v-else>
    <div class="card" >
        <div class="card-content">
            <div class="level">
                <img src="{{ $thread->creator->avatar_path }}" alt="{{ $thread->creator->username }}" width="30" height="30">

                <span class="flex">
                <a href="{{ '/@' . $thread->creator->username }}">{{ $thread->creator->username }}</a> posted: <span v-text="title"></span>
            </span>
            </div>
        </div>

        <div class="card-content">
            <vue-markdown v-html="body"></vue-markdown>
        </div>

        <div class="card-content" v-if="authorize('owns', thread)">
            <button class="button" @click="editing = true">Edit</button>
        </div>
    </div>
</div>