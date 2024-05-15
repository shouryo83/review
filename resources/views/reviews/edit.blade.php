<x-app-layout>
    <x-slot name="header">
        <div class='flex items-center'>
            <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                戻る
            </button>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight pl-2">
                投稿編集
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <form action="/reviews/{{ $review->id }}" method="POST" class="w-full max-w-2xl mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    タイトル
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" name="review[title]" value="{{ $review->title }}">
                <p class="text-red-500 text-xs italic pt-1.5">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="festival">
                    参戦したフェス
                </label>
                {{-- フェスティバルの名前と年のセレクトボックス --}}
                <select id="festival-select" class="test rounded">
                    @foreach ($festivals as $nameYear => $festivalDetails)
                        <option value="{{ $nameYear }}" {{  $review->festival->name . ' (' . $review->festival->date->format('Y') . ')' == $nameYear ? 'selected' : '' }}>{{ $nameYear }}</option>
                    @endforeach
                </select>
                {{-- 月日を選択するためのセレクトボックス --}}
                <select id="festival-date-select" name="review[festival_id]" class="test rounded" disabled>
                    {{-- JavaScriptでオプションを動的に挿入します --}}
                </select>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="artist">
                    目当てのアーティスト
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="artist" type="text" name="review[artist]" value="{{ $review->artist }}">
                <p class="text-red-500 text-xs italic pt-1.5">{{ $errors->first('review.artist') }}</p>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="body">
                    感想
                </label>
                <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="body" name="review[body]" rows="5">{{ $review->body }}</textarea>
                <p class="text-red-500 text-xs italic">{{ $errors->first('review.body') }}</p>
            </div>
            <div class="flex justify-center">
                <input type="submit" value="更新" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">
            </div>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reviewFestivalId = @json($review->festival_id);
            async function loadFestivalDates() {
                const festivalSelect = document.getElementById('festival-select');
                if (!festivalSelect.value) return;  // 初期値が設定されていない場合は何もしない
                const selectedOption = festivalSelect.value.split(' (');
                const festivalName = selectedOption[0];
                const festivalYear = selectedOption[1].slice(0, -1);  // ")" を削除
                const dateSelect = document.getElementById('festival-date-select');
                dateSelect.innerHTML = '';  // セレクトボックスをクリア
                dateSelect.disabled = true;  // 新しいデータの取得前にセレクトボックスを無効化
                const response = await fetch(`/festivals/${encodeURIComponent(festivalName)}/${encodeURIComponent(festivalYear)}`);
                const dates = await response.json();
                dates.forEach(({ id, date }) => {
                    const option = document.createElement('option');
                    option.value = id;  // オプションの値をフェスティバルのIDに設定
                    option.textContent = new Date(date).toLocaleDateString('ja-JP');  // 日付を "年/月/日" 形式で表示
                    if (id == reviewFestivalId) {  // id が reviewFestivalId と一致する場合
                        option.selected = true;  // selected 属性を追加
                    }
                    dateSelect.appendChild(option);
                });
                dateSelect.disabled = false;  // セレクトボックスを再度有効化
            }
            document.getElementById('festival-select').addEventListener('change', loadFestivalDates);
            loadFestivalDates();  // 初期読み込み時に実行
        });
    </script>
</x-app-layout>
