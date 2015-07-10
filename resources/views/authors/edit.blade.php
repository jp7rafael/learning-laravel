@extends($template)

@section('content')
  {!! Form::model($author, ['method' => 'PATCH', 'route' => ['authors.update', $author->id], 'data-remote' => 'true']) !!}
      @include ('authors.form', ['submitButtonText' => 'Edit Author'])
  {!! Form::close() !!}
@endsection
