<x-app-layout>
    <x-slot name="header">
        <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            戻る
        </button>
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('コメント編集') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <form action="/comments/{{ $comment->id }}" method="POST" class="w-full max-w-2xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="comment" class="block text-gray-700 text-sm font-bold mb-2">
                    コメント
                </label>
                <textarea name="comment" id="comment" cols="50" rows="5" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="コメントをここに入力してください。">{{ $comment->comment }}</textarea>
                <p class="text-red-500 text-xs italic">{{ $errors->first('comment') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <input type="submit" value="更新" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            </div>
        </form>
    </div>
</x-app-layout>
