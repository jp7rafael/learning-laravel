<article>
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>
    <div>{{ $article->published_at }}</div>
</article>
{!! link_to_route('articles.index', 'Articles') !!}
