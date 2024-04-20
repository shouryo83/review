<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿編集') }}
        </h2>
    </x-slot>
        <div class="content">
            <form action="/reviews/{{ $review->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class='content_title'>
                    <h2>タイトル</h2>
                    <input type='text' name='review[title]' value="{{ $review->title }}">
                </div>
                <div class='content_body'>
                    <h2>感想</h2>
                    <input type='text' name='review[body]' value="{{ $review->body }}">
                </div> 
                <div class='content_festival'>
                    <h2>参戦したフェス</h2>
                    <select name="review[festival_id]">
                        @foreach($festivals as $festival)
                            <option value="{{ $festival->id }}">{{ $festival->name }}({{ $festival->date }})</option>
                        @endforeach
                    </select>
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