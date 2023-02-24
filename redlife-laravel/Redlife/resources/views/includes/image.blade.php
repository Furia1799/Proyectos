<!--Only image -->
<div class="card">
    <div class="card-header">
        @if ($image->user->image)
            <div class="avatar_public">
                <img src="{{ route('user.avatar', ['filename' => $image->user->image]) }}" class="avatar"
                    name="image" />
            </div>
        @endif
        <div class="name_public">
            <a href="{{ route('profile', ['id' => $image->user->id]) }}">
                {{ $image->user->name . ' ' . $image->user->last_name }}
            </a>
            <span class="nick_public">
                {{ ' | @' . $image->user->nick }}
            </span>
        </div>
    </div>
    <div class="card-body">
        <div class="image_public">
            <a href="{{ route('image.detail', ['id' => $image->id]) }}">
                <img id="image_public" src="{{ route('image.file', ['filename' => $image->image_path]) }}" />
            </a>
        </div>
        <?php $user_like = false; ?>
        @foreach ($image->likes as $like)
            @if ($like->user->id == Auth::user()->id)
                <?php $user_like = true; ?>
            @endif
        @endforeach

        <div class="likes_public">
            @if ($user_like)
                <i id="star" class="bi bi-star-fill btn-like" data-id="{{ $image->id }}"></i>
            @else
                <i id="star-2" class="bi bi-star-fill btn-dislike" data-id="{{ $image->id }}"></i>
            @endif
            <span class="number-like">{{ count($image->likes) }}</span>
            <!--<p id="hola">Hola</p> -->
            <a href="{{ route('image.detail', ['id' => $image->id]) }}"><i id="comment" class="bi bi-chat-left-text"></i>
                ({{ count($image->comments) }})</a>
        </div>
        <div class="description_public">
            <span class="nick_public">{{ '@' . $image->user->nick }}</span>
            <p>{{ $image->description }}</p>
            <!--<span class="nick_public">{{ ' | ' . $image->created_at }}</span>-->
            <span class="nick_public">{{ ' | ' . FormatTime::LongTimeFilter($image->created_at) }}</span>
        </div>
    </div>
</div>
