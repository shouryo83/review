<x-app-layout>
    <x-slot name="header">
        <button type="button" onClick="history.back()">[戻る]</button>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           過去の出演者
        </h2>
    </x-slot>
        <div class="container">
            <ul>
                @foreach($playlists as $playlist)
                <li><a href="{{ route('playlists.show',['id' => $playlist['id']]) }}">{{ $playlist['name'] }}</a></li>
                @endforeach
            </ul>
        </div>
 
</x-app-layout>