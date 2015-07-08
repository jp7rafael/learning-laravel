@extends($remote ? 'layouts.ajax' : 'layouts.html')

@section('content')
  {!! Form::open(['route' => 'authors.store', 'data-remote' => 'true']) !!}
      @include ('authors.form', ['submitButtonText' => 'Add Author'])
  {!! Form::close() !!}
@endsection
