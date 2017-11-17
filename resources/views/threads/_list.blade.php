@forelse ($threads as $thread)
    <div class="column card">
        <div class="card-image">
            <figure class="image is-4by3">
                <img src="https://phpmap.co/images/bg-banner.jpg" alt="Placeholder image">
            </figure>
        </div>
        <div class="card-content">
            <div class="media">
                <div class="media-left">
                    <figure class="image is-48x48">
                        <img src="{{ $thread->creator->avatar_path }}" alt="{{ $thread->creator->username }}">
                    </figure>
                </div>
                <div class="media-content">
                    <p class="title is-4">
                        <a href="{{ $thread->path() }}">
                            @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                                <strong>
                                    {{ $thread->title }}
                                </strong>
                            @else
                                {{ $thread->title }}
                            @endif
                        </a>
                    </p>
                    <p class="subtitle is-6">{{ '@' . $thread->creator->username }}</p>
                </div>
            </div>

            <div class="content">
                {{ str_limit($thread->body, '150') }}
                <br><br>
                <a  href="{{ $thread->path() }}">
                    {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
                </a>
                | {{ $thread->visits }} Visits
            </div>
        </div>
    </div>
@empty
    <p>There are no relevant results at this time.</p>
@endforelse