<x-app-layout>
    <x-slot name="header">
        <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            戻る
        </button>
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
           {{ $festival->name }}({{ $festival->date->format('Y-m-d') }})
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach ($reviews as $review)
                        <div class='reviews mb-6 p-6 bg-gray-100 rounded-lg shadow-md'>
                            <p class='name font-medium text-lg'>投稿者：{{ $review->user->name }}</p>
                            <h2 class="text-lg font-semibold text-blue-600 hover:text-blue-800">
                                タイトル：<a href="/reviews/{{ $review->id }}">{{ $review->title }}</a>
                            </h2>
                            <h2 class="text-md mb-2">
                                参戦したフェス：{{ $review->festival->name }}({{ $review->festival->date->format('Y-m-d') }})
                            </h2>
                            <p class='artist text-gray-600'>目当てのアーティスト：{{ $review->artist }}</p>
                            <p class='body text-gray-800 my-4'>感想：{{ $review->body }}</p>
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
                            <h2 class="text-md font-semibold mb-4">
                                <a href="/reviews/{{ $review->id }}" class="text-blue-600 hover:text-blue-800">コメントする</a>
                                コメント数({{ $review->comments->count() }})
                            </h2>
                            @can('delete', $review)
                                <form action="/reviews/{{ $review->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="deleteReview({{ $review->id }})" class="text-red-500 hover:text-red-700">削除</button>
                                </form>
                                <script>
                                    function deleteReview(id) 
                                    {
                                        return confirm('削除すると復元できません。\n本当に削除しますか？');
                                    }
                                </script>
                            @endcan
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
