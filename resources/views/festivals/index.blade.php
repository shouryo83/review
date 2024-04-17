<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('JAPAN JAM') }} 
        </h2>
    </x-slot>
        <h1>Review Name</h1>
        <a href='/reviews/create'>[作成]</a>
            @foreach ($reviews as $review)
                <div class='reviews'>
                    <p calss='name'>投稿者：{{ $review->user->name }}</p>
                    <h2>タイトル：<a href="/reviews/{{ $review->id }}">{{ $review->title }}</a></h2>
                    <a>参戦したフェス：</a><a href="/festivals/{{ $review->festival->id }}">{{ $review->festival->name }}({{ $review->festival->date }})</a>
                    <p class='artist'>目当てのアーティスト：{{ $review->artist }}</p>
                    <p class='body'>本文：{{ $review->body }}</p>
                    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deleteReview({{ $review->id }})">[削除]</button>
                    </form>
                </div>
            @endforeach
        <div class='paginate'>
            {{ $reviews->links() }}
        </div>
        <script>
            function deleteReview(id){
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
</x-app-layout>