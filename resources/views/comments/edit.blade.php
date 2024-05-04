<x-app-layout>
    <x-slot name="header">
        <a href="/reviews/{{ $comment->review->id }}">[戻る]</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('コメント編集') }}
        </h2>
    </x-slot>
        <div class="content">
            <form action="/comments/{{ $comment->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content_comment'>
                    <label for="comment">コメント</label><br>
                    <textarea name="comment" id="comment" cols="50" rows="5">{{ $comment->comment }}</textarea><br>
                    <p class="comment_error" style="color:red">{{ $errors->first('comment') }}</p>
                </div>
                <input type="submit" value="[更新]"/>
            </form>
        </div>
</x-app-layout>