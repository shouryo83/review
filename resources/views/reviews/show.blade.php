<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿内容') }}
        </h2>
    </x-slot>
        <div class="edit">
        <a href="/reviews/{{ $review->id }}/edit">[編集]</a>
        </div>
        
        <h1 class"title">
            タイトル：{{ $review->title }}
        </h1>
        
         <div class="content">
            <div class="content_review">
                <h3>本文：</h3>
                <p>{{ $review->body }}</p>
            </div>
        </div>
        <a>参戦したフェス：</a><a href="/festivals/{{ $review->festival_id }}">{{ $review->festival->name }}({{ $review->festival->date }})</a>
        <div class="artist">
            <p>目当てのアーティスト：{{ $review->artist }}</p>
        </div>
        
        <form action ="/reviews/{{ $review->id }}/comments" method="POST">
            @csrf
            <div class="comment">
                <label for="comment">コメント：</label><br>
                <textarea name="comment" id="comment" cols="50" rows="5" placeholder="私も参戦しました！">{{ old('comment') }}</textarea><br>
                <p class="comment_error" style="color:red">{{ $errors->first('comment') }}</p>
            </div>
            <input type="submit" value="[コメント投稿]"/>
        </form>

        <div class="footer">
            <a href="/">[戻る]</a>
        </div>
</x-app-layout>