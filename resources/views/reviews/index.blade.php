<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            ROCKIN'ON JAPAN主催 音楽フェス 口コミサイト
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($reviews as $review)
                        <div class='reviews mb-8 p-6 bg-gray-100 rounded-lg shadow-md'>
                            <div class='flex items-center mb-2'>
                                <h2 class="text-lg font-semibold">
                                    タイトル：<a href="/reviews/{{ $review->id }}" class="text-blue-600 hover:text-blue-800">{{ $review->title }}</a>
                                </h2>
                                @can('delete', $review)
                                    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteReview({{ $review->id }})" class="text-sm bg-red-600 mx-5 text-white font-bold py-1 px-2 rounded">
                                            削除
                                        </button>
                                        <script>
                                            function deleteReview(id){ 
                                                'use strict'
                                                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                                                    document.getElementById(`form_${id}`).submit();
                                                }
                                            }
                                        </script>
                                    </form>
                                @endcan
                            </div>
                            <p class='name text-gray-800 mb-1 font-semibold'>投稿者：{{ $review->user->name }}</p>
                            <h2 class="text-sm mb-1">
                                参戦したフェス：<a href="/festivals/{{ $review->festival->id }}" class="text-blue-600 hover:text-blue-800">{{ $review->festival->name }}({{ $review->festival->date->format('Y-m-d') }})</a>
                            </h2>
                            <p class='artist text-gray-600 mb-1'>目当てのアーティスト：{{ $review->artist }}</p>
                            <p class='body text-gray-800 mb-4'>感想：{{ $review->body }}</p>
                            <div class='like mb-4'>
                                @if($review->is_liked_by_auth_user())
                                    <a href="{{ route('unlike', ['id' => $review->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        いいね！
                                        <span class="badge text-gray-800 text-white">({{ $review->likes->count() }})</span>
                                    </a>
                                @else
                                    <a href="{{ route('like', ['id' => $review->id]) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded">
                                        いいね！
                                        <span class="badge text-gray-800">({{ $review->likes->count() }})</span>
                                    </a>
                                @endif
                            </div>
                            <h2 class="text-sm font-semibold">
                                <a href="/reviews/{{ $review->id }}" class="text-blue-600 hover:text-blue-800">コメント数({{ $review->comments->count() }})</a>
                            </h2>
                        </div>
                    @endforeach

                    <div class='paginate mt-8'>
                        {{ $reviews->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
