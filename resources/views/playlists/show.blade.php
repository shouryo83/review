<x-app-layout>
    <x-slot name="header">
        <a href="/">[戻る]</a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ $playlists['name'] }}
        </h2>
    </x-slot>
        <div class="container">
            <h2>Spotify APIでROCKIN'ON JAPANの予習プレイリストを表示しているため、当日演奏し曲ていない曲であったり、アーティスト名がローマ字になっています。</h2>
            <ul>
                @foreach($playlists['tracks']['items'] as $item)
                <li>{{ $item['track']['name'] }} by {{ implode(', ', array_map(fn($artist) => $artist['name'], $item['track']['artists'])) }}</li>
                @endforeach
            </ul>
        </div>
 
</x-app-layout>