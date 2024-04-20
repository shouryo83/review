<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿作成') }}
        </h2>
    </x-slot>
        <form action="/reviews" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="review[title]" placeholder="初めて参戦しました！" value="{{ old('review.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="festival">
                <h2>参戦したフェス</h2>
                <select name="review[festival_id]">
                    @foreach($festivals as $festival)
                        <option value="{{ $festival->id }}">{{ $festival->name }}({{ $festival->date }})</option>
                    @endforeach
                </select>
            <div class="artist">
                <h2>お目当てのアーティスト</h2>
                <input type="text" name="review[artist]" placeholder="" value="{{ old('review.artist') }}"/>
                <p class="artist_error" style="color:red">{{ $errors->first('review.artist') }}</p>
            </div>
            <div class="body">
                <h2>感想</h2>
                <textarea name="review[body]" cols="50" rows="5" placeholder="生の演奏は最高でした！">{{ old('review.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            </div>
            <input type="submit" value="[保存]"/>
        </form>
        <div class="back"><a href="/">[戻る]</a>
        </div>
</x-app-layout>