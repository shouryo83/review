<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ロッキングオン主催フェス口コミ') }}
        </h2>
    </x-slot>
    
   <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 bg-white border-b border-gray-200">
                    <a href='/reviews/create'>[作成]</a>
                        @foreach ($reviews as $review)
                            <div class='reviews'>
                                <p calss='name'>投稿者：{{ $review->user->name }}</p>
                                <h2>タイトル：<a href="/reviews/{{ $review->id }}">{{ $review->title }}</a></h2>
                                <h2>参戦したフェス：<a href="/festivals/{{ $review->festival->id }}">{{ $review->festival->name }}({{ $review->festival->date }})</a></h2>
                                <p class='artist'>目当てのアーティスト：{{ $review->artist }}</p>
                                <p class='body'>感想：{{ $review->body }}</p>
                                <h2><a href="/reviews/{{ $review->id }}">いいね・コメントする</a> いいね({{ $review->likes->count() }}) コメント({{ $review->comments->count() }})</h2>
                                <form action="/reviews/{{ $review->id }}" id="form_{{ $review->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="deleteReview({{ $review->id }})">[削除]</button>
                                </form>
                            </div>
                        @endforeach

                    <div class='paginate'>
                        {{ $reviews->links() }}
                    </div>
                    <script>
                        function deleteReview(id){
                            'use strict'
                            
                            if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                                document.getElementById(`form_${id}`).submit();
                            }
                        }
                    </script>
                    <a href='/spotify/redirect'>[過去の出演者]</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
