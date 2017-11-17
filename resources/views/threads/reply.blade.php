<reply :attributes="{{ $reply }}" inline-template v-cloak>
        <div class="card-body">
    <div id="reply-{{ $reply->id }}" class="card">
        <h5 class="card-title">
            <a href="{{ route('profile', $reply->owner) }}">
                {{ $reply->owner->name }}
            </a> said {{ $reply->created_at->diffForHumans() }}...
        </h5>

        @if (Auth::check())
            <div>
                <favorite :reply="{{ $reply }}"></favorite>
            </div>
        @endif

        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>

                <button class="btn btn-xs btn-primary" @click="update">Update</button>
                <button class="btn btn-xs btn-link" @click="editing = false">Cancel</button>
            </div>

            <div v-else v-text="body"></div>
        </div>

        @can ('update', $reply)
            <div class="card-footer level">
                <button class="btn btn-sm mr-1" @click="editing = true">Edit</button>
                <button class="btn btn-sm btn-danger mr-1" @click="destroy">Delete</button>
            </div>
        @endcan
    </div>
</reply>