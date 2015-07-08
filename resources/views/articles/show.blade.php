@extends('layouts.html')

@section('content')
  <h1>{{ $article->title }}</h1>
  <div>{{ $article->content }}</div>
  <div>{{ $article->published_at }}</div>
  <div>{{ $article->author->name }}</div>
  {!! link_to_route('articles.index', 'Articles') !!}
@endsection
