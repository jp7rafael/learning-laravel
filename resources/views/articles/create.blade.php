@extends($template)

@section('content')
  {!! Form::open(['route' => 'articles.store', 'data-remote' => 'true']) !!}
      @include ('articles.form', ['submitButtonText' => 'Add Article'])
  {!! Form::close() !!}
@endsection
