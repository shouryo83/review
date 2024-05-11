<x-app-layout>
    <x-slot name="header">
        <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            戻る
        </button>
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('投稿編集') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <form action="/reviews/{{ $review->id }}" method="POST" class="w-full max-w-lg">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-title">
                        タイトル
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-300 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-title" type="text" name="review[title]" value="{{ $review->title }}">
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-festival">
                        参戦したフェス
                    </label>
                    <div class="relative">
                        <select class="block appearance-none w-full bg-gray-200 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-blue-500" id="grid-festival" name="review[festival_id]">
                            @foreach($festivals as $festival)
                                <option value="{{ $festival->id }}" {{ $review->festival_id == $festival->id ? 'selected' : '' }}>
                                    {{ $festival->name }}({{ $festival->date }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-artist">
                        目当てのアーティスト
                    </label>
                    <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-artist" type="text" name="review[artist]" value="{{ $review->artist }}">
                </div>
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-body">
                        感想
                    </label>
                    <textarea class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="grid-body" name="review[body]" rows="5">{{ $review->body }}</textarea>
                </div>
            </div>
            <div class="flex justify-center">
                <input type="submit" value="更新" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
            </div>
        </form>
    </div>
</x-app-layout>
