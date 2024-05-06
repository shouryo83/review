<x-app-layout>
        <x-slot name="header">
        <button type="button" onClick="history.back()">[戻る]</button>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ '投稿作成' }}
        </h2>
        </x-slot>
        <form action="/reviews" method="POST">
            @csrf
            <div class="title">
                <h2>タイトル</h2>
                <input type="text" name="review[title]" placeholder="初めて参戦しました！" value="{{ old('review.title') }}"/>
                <p class="title_error" style="color:red">{{ $errors->first('review.title') }}</p>
            </div>
            <div class="festival">
                <h2>参戦したフェス</h2>
                <!--<select name="review[festival_id]">-->
                <!--    @foreach($festivals as $festival)-->
                <!--        <option value="{{ $festival->id }}">{{ $festival->name }}({{ $festival->date }})</option>-->
                <!--    @endforeach-->
                <!--</select>-->
                <select id="festival-select">
                    @foreach ($festivals as $festival)
                        <option value="{{ $festival->name }}_{{ $festival->year }}">{{ $festival->name }} {{ $festival->year }}</option>
                    @endforeach
                </select>
                <select id="date-select">

                </select>
                <script>
document.getElementById('festival-select').addEventListener('change', function() {
    var selected = this.value.split('_');
    fetch('/dates?name=' + selected[0] + '&year=' + selected[1])
        .then(response => response.json())
        .then(data => {
            var dateSelect = document.getElementById('date-select');
            dateSelect.innerHTML = '';
            data.forEach(function(date) {
                var option = new Option(date.date, date.date);
                dateSelect.appendChild(option);
            });
        });
});
</script>

            <div class="artist">
                <h2>お目当てのアーティスト</h2>
                <input type="text" name="review[artist]" placeholder="" value="{{ old('review.artist') }}"/>
                <p class="artist_error" style="color:red">{{ $errors->first('review.artist') }}</p>
            </div>
            <div class="body">
                <h2>感想</h2>
                <textarea name="review[body]" cols="50" rows="5" placeholder="生の演奏は最高でした！">{{ old('review.body') }}</textarea>
                <p class="body_error" style="color:red">{{ $errors->first('review.body') }}</p>
            </div>
            </div>
            <input type="submit" value="[保存]"/>
        </form>
</x-app-layout>