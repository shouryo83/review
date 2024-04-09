<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('コメント作成') }}
        </h2>
    </x-slot>
        <h1>Review Name</h1>
        <form action="/reviews" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="review[title]" placeholder="タイトル" value="{{ old('review.title') }}"/>
                <p class="title_error" style"color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="review[body]" placeholder="今日も１日お疲れさまでした。">{{ old('review.body') }}</textarea>
                <p class="body_error" style"color:red">{{ $errors->first('review.body') }}</p>
            </div>
            <input type="submit" value="保存"/>
        </form>
        <div class="back">[<a href="/">戻る</a>]
        </div>
</x-app-layout>