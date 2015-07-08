@extends($remote ? 'layouts.ajax' : 'layouts.html')

@section('content')
  <div>
      <h1>{{ $author->name }}</h1>
      <p>{{ $author->email }}</p>
      {!! link_to_route('authors.index', 'Authors', null, ['data-remote' => 'true']) !!}
  </div>
@endsection
