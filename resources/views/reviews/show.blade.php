<x-app-layout>
    <x-slot name="header">
        <a href="/">[戻る]</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $review->title }}
        </h2>
    </x-slot>
        <div class="edit">
            <a href="/reviews/{{ $review->id }}/edit">[編集]</a>
        </div>
        <div class="review_user">
          <p>投稿者：{{ $review->user->name }}</p>
        </div>
        <div class="festival">
            <p>参戦したフェス：<a href="/festivals/{{ $review->festival_id }}">{{ $review->festival->name }}({{ $review->festival->date }})</a></p>
        </div>
        <div class="artist">
            <p>目当てのアーティスト：{{ $review->artist }}</p>
        </div>
        <div class="body">
            <div class="body">
                <p>感想：{{ $review->body }}</p>
            </div>
        </div>
        <div class='like'>
          @if($review->is_liked_by_auth_user())
            <a href="{{ route('unlike', ['id' => $review->id]) }}" class="btn btn-success btn-sm">
              いいね！
              <span class="badge">
                {{ $review->likes->count() }}
              </span>
            </a>
          @else
            <a href="{{ route('like', ['id' => $review->id]) }}" class="btn btn-secondary btn-sm">
              いいね！
              <span class="badge">
               {{ $review->likes->count() }}
              </span>
            </a>
          @endif
        </div>
        <div class="comment">
            @if ($comments->count())
              @foreach($comments as $comment)
                <p>コメント：{{ $comment->comment }} 投稿者：{{ $comment->user->name }}</p>
                <form action="/comments/{{ $comment->id }}" id="form_{{ $comment->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteComment({{ $comment->id }})">[コメント削除]</button>
                    <a href="/comments/{{ $comment->id }}/edit">[コメント編集]</a>
                </form>
              @endforeach
            @else
              No comments
            @endif
            <script>
                function deleteComment(id) {
                    'use strict'
                    
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            <form action ="/reviews/{{ $review->id }}/comments" method="POST">
                @csrf
                <div class="comment">
                    <label for="comment">コメント入力：</label><br>
                    <textarea name="comment" id="comment" cols="50" rows="5" placeholder="私も参戦しました！">{{ old('comment') }}</textarea><br>
                    <p class="comment_error" style="color:red">{{ $errors->first('comment') }}</p>
                </div>
                <input type="submit" value="[コメント投稿]">
            </form>
        </div>
</x-app-layout>