<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('自分の投稿') }}
        </h2>
    </x-slot>
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                    <a href='/reviews/create'>[作成]</a>
                        @foreach ($own_reviews as $review)
                            <div class='reviews'>
                                <p calss='name'>投稿者：{{ $review->user->name }}</p>
                                <h2>タイトル：<a href="/reviews/{{ $review->id }}">{{ $review->title }}</a></h2>
                                <h2>参戦したフェス：<a href="/festivals/{{ $review->festival->id }}">{{ $review->festival->name }}({{ $review->festival->date }})</a></h2>
                                <p class='artist'>目当てのアーティスト：{{ $review->artist }}</p>
                                <p class='body'>感想：{{ $review->body }}</p>
                                <div class='like'>
                                    @if($review->is_liked_by_auth_user())
                                        <a href="{{ route('unlike', ['id' => $review->id]) }}" class="btn btn-success btn-sm">
                                            いいね！
                                          <span class="badge">
                                            {{ $review->likes->count() }}
                                          </span>
                                        </a>
                                    @else
                                        <a href="{{ route('like', ['id' => $review->id]) }}" class="btn btn-secondary btn-sm">
                                            いいね！
                                          <span class="badge">
                                            {{ $review->likes->count() }}
                                          </span>
                                        </a>
                                    @endif
                                </div>
                                <h2><a href="/reviews/{{ $review->id }}" class="">[コメントする]</a> コメント数({{ $review->comments->count() }})</h2>
                                @can('delete', $review)
                                    <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteReview({{ $review->id }})">[削除]</button>
                                    </form>
                                @endcan
                            </div>
                        @endforeach

                    <div class='paginate'>
                        {{ $own_reviews->links() }}
                    </div>
                    <script>
                        function deleteReview(id){
                            'use strict'
                            
                            if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                                document.getElementById(`form_${id}`).submit();
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>