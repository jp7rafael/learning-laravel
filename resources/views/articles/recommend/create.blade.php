@extends($remote ? 'layouts.ajax' : 'layouts.html')

@section('content')
  <h4>Recommend "{{ $article->title }}" by e-mail</h4>
  <p>
  {!! Form::open(['url' => route('articles.recommend.send', $article->id), 'data-remote' => 'true']) !!}        
    <div class='form-group'>
      {!! Form::label('email', 'Email:') !!}
      {!! Form::text('email', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Send me by e-mail', ['class' => 'btn btn-primary']) !!}
  {!! Form::close() !!}
  </p>
@endsection
