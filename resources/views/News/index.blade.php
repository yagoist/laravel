@if (empty($news))
    <h1>Новостей нет</h1>
@else
    @foreach($news as  $n)
    <div style="border: 1px solid black">
        <h2> {{ $n['title'] }} </h2>
        <p>{{ $n['description'] }}</p>
        <div>
            <strong> {{ $n['author'] }} ({{ $n['created_at'] }})</strong>
            <a href="{{ route('news.show', ['id' => $n['id']]) }}">подробнее</a>
        </div>
    </div>
    @endforeach
@endif

