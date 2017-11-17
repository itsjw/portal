@forelse ($threads as $thread)
    <div class="col-md-4 forums-card">
        <div class="card">
            <img class="card-img-top" src="https://phpmap.co/images/bg-banner.jpg">
            <div class="card-block">
                <figure class="profile">
                    <img src="{{ $thread->creator->avatar_path }}" class="profile-avatar" alt="{{ $thread->creator->username }}">
                </figure>
                <h4 class="card-title mt-3">
                    <a href="{{ $thread->path() }}">
                        @if (auth()->check() && $thread->hasUpdatesFor(auth()->user()))
                            <strong>
                                {{ $thread->title }}
                            </strong>
                        @else
                            {{ $thread->title }}
                        @endif
                    </a>
                </h4>
                <div class="meta">
                    <a>Friends</a>
                </div>
                <div class="card-text">
                    {{ str_limit($thread->body, '150') }}
                </div>
            </div>

            <div class="card-footer">
                <small>
                    <a  href="{{ $thread->path() }}">
                        {{ $thread->replies_count }} {{ str_plural('reply', $thread->replies_count) }}
                    </a>

                    | {{ $thread->visits }} Visits
                </small>
                <a class="btn btn-secondary float-right btn-sm" href="{{ $thread->path() }}">Read More</a>
            </div>
        </div>
        <br>
    </div>

@empty
    <p>There are no relevant results at this time.</p>
@endforelse