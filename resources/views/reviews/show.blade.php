<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿内容') }}
        </h2>
    </x-slot>
        <h1 class"title">
            {{ $review->title }}
        </h1>
        <div class="edit">
            <a href="/reviews/{{ $review->id }}/edit">[編集]</a>
        </div>
         <div class="content">
            <div class="content_review">
                <h3>本文</h3>
                <p>{{ $review->body }}</p>
            </div>
        </div>
        <a>参戦したフェス：</a><a href="/festivals/{{ $review->festival_id }}">{{ $review->festival->name }}</a>
        <div class="artist">
            <p>目当てのアーティスト：{{ $review->artist }}</p>
        </div>
        <div class="footer">
            <a href="/">[戻る]</a>
        </div>
</x-app-layout>