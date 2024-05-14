<x-app-layout>
    <x-slot name="header">
        <div class='flex items-center'>
            <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded">
                戻る
            </button>
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight pl-2">
               過去の出演者
            </h2>
        </div>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <ul class="list-disc space-y-2 pl-5">
                @foreach($playlists as $playlist)
                <li class="text-lg text-gray-700 hover:text-gray-900">
                    <a href="{{ route('playlists.show',['id' => $playlist['id']]) }}" class="hover:underline">{{ $playlist['name'] }}</a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
