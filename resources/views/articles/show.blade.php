@extends($template)

@section('content')
<article>
    <h1>{{ $article->title }}</h1>
    <div class='row'>
      <div class='pull-left' data-remote-picture='{{ $article->title }}'></div>
      <div>{{ $article->content }}</div>
    </div>
    <div>{{ $article->published_at }}</div>
    <div>{{ $article->author->name }}</div>
</article>
  {!! link_to_route('articles.index', 'Articles', null, ['data-remote' => 'true']) !!}
@endsection
