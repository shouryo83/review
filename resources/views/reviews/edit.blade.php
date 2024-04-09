<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('編集') }}
        </h2>
    </x-slot>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/reviews/{{ $review->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content_title'>
                    <h2>タイトル</h2>
                    <input type='text' name='review[title]' value="{{ $review->title }}">
                </div>
                <div class='content_body'>
                    <h2>本文</h2>
                    <input type='text' name='review[body]' value="{{ $review->body }}">
                </div> 
                <div class="festival">
                    <h2>参戦したフェス</h2>
                    <input type='' name='review[festival_id]' value="{{ $review->festival_id }}">
                </div>
                <div class='content_artist'>
                    <h2>目当てのアーティスト</h2>
                    <input type='text' name='review[artist]' value="{{ $review->artist }}">
                </div>
                <p>
                <input type="submit" value="保存">
                </p>
            </form>
        </div>
</x-app-layout>