<div class="box content">
@forelse ($threads as $thread)
    <article class="post">
        <h4><a href="/threads/{{ $thread->channel->slug }}/{{ $thread->slug }}">{{ $thread->title }}</a></h4>
        <span class="pull-right has-text-grey-light"><i class="fa fa-comments"></i> {{ $thread->replies_count }}</span>
        <div class="media">
            <div class="media-left">
                <p class="image is-32x32">
                    <img src="{{ $thread->creator->avatar_path }}" alt="{{ $thread->creator->username }}">
                </p>
            </div>
            <div class="media-content">
                <div class="content">
                    <p>
                        <a href="/{{ '@' . $thread->creator->username }}">{{ '@' . $thread->creator->username }}</a> created this thread {{ $thread->created_at->diffForHumans() }}  &nbsp;
                        <span class="tag">{{ $thread->visits }} Visits</span>
                    </p>
                </div>
            </div>
        </div>
    </article>
@empty
    <p>There are no relevant results at this time.</p>
@endforelse

</div>