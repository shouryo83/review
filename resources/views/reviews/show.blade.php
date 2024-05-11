<x-app-layout>
    <x-slot name="header">
        <div>
        <button type="button" onClick="history.back()" class="text-sm bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            戻る
        </button>
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ $review->title }}
        </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Review Details -->
                    <div class="review-details space-y-4">
                        <div class="review_user">
                            <p class="font-medium text-lg">投稿者：{{ $review->user->name }}</p>
                        </div>
                        <div class="festival">
                            <p class="text-md">参戦したフェス：<a href="/festivals/{{ $review->festival_id }}" class="text-blue-600 hover:text-blue-800">{{ $review->festival->name }}({{ $review->festival->date }})</a></p>
                        </div>
                        <div class="artist">
                            <p class="text-md">目当てのアーティスト：{{ $review->artist }}</p>
                        </div>
                        <div class="body">
                            <p class="text-md">感想：{{ $review->body }}</p>
                        </div>
                    </div>

                    <!-- Like and Edit Buttons -->
                    <div class="flex items-center space-x-4 mt-4">
                        @can('edit', $review)
                            <a href="/reviews/{{ $review->id }}/edit" class="text-blue-600 hover:text-blue-800">編集</a>
                        @endcan

                        <div class='like'>
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
                    </div>

                    <!-- Comments Section -->
                    <div class="comments mt-6">
                        <h3 class="font-semibold text-xl mb-4">コメント</h3>
                        @forelse ($comments as $comment)
                            <div class="comment mb-4 p-4 bg-gray-100 rounded-lg">
                                <p class="mb-2">{{ $comment->comment }} - <span class="font-medium">投稿者：{{ $comment->user->name }}</span></p>
                                @can('edit', $comment)
                                    <div class="flex items-center space-x-2">
                                        <a href="/comments/{{ $comment->id }}/edit" class="text-blue-600 hover:text-blue-800">コメント編集</a>
                                        <form action="/comments/{{ $comment->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700">コメント削除</button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        @empty
                            <p class="text-gray-700">コメントはまだありません。</p>
                        @endforelse
                    </div>

                    <!-- Comment Form -->
                    <div class="comment-form mt-6">
                        <form action="/reviews/{{ $review->id }}/comments" method="POST">
                            @csrf
                            <textarea name="comment" id="comment" cols="30" rows="4" class="w-full p-2 border border-gray-300 rounded-lg" placeholder="コメントを入力..."></textarea>
                            <button type="submit" class="mt-4 px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-lg">コメント投稿</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
