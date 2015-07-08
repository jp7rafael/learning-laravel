@extends($remote ? 'layouts.ajax' : 'layouts.html')

@section('content')
  <article>
    <h1>{{ $article->title }}</h1>
    <div>{{ $article->content }}</div>
    <div>{{ $article->published_at }}</div>
    <div>{{ $article->author->name }}</div>
  </article>
  {!! link_to_route('articles.index', 'Articles', null, ['data-remote' => 'true']) !!}
@endsection
