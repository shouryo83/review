<x-app-layout>
    <x-slot name="header">
        <div class='flex items-center'>
            <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                戻る
            </button>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight pl-2">
                {{ $playlists['name'] }}
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h2 class="text-lg text-gray-700 mb-4">
                SpotifyのROCKIN'ON JAPANの予習プレイリストを表示しているため、当日演奏されていない曲であったり、表記が多少違っています。
            </h2>
            <ul class="list-disc space-y-2 pl-5">
                @foreach($playlists['tracks']['items'] as $item)
                <li class="text-md text-gray-700 hover:text-gray-900">
                    {{ $item['track']['name'] }} by {{ implode(', ', array_map(fn($artist) => $artist['name'], $item['track']['artists'])) }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
