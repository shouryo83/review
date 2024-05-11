<x-app-layout>
    <x-slot name="header">
        <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            戻る
        </button>
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            投稿作成
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <form action="/reviews" method="POST" class="w-full max-w-xl mx-auto">
            @csrf
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    タイトル
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="review[title]" placeholder="初めて参戦しました！" value="{{ old('review.title') }}"/>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="festival">
                    参戦したフェス
                </label>
                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="festival-select" name="review[festival_id]">
                    @foreach ($festivals as $festival)
                        <option value="{{ $festival->id }}">{{ $festival->name }} ({{ $festival->year }})</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="artist">
                    お目当てのアーティスト
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="artist" type="text" name="review[artist]" placeholder="" value="{{ old('review.artist') }}"/>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.artist') }}</p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    感想
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" name="review[body]" rows="5" placeholder="生の演奏は最高でした！">{{ old('review.body') }}</textarea>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" value="保存"/>
            </div>
        </form>
    </div>
</x-app-layout>
