<div>
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title') !!}
</div>
<div>
    {!! Form::label('content', 'Content:') !!}
    {!! Form::textArea('content') !!}
</div>
<div>
    {!! Form::label('published_at', 'Published At:') !!}
    {!! Form::input('date', 'published_at', date('Y-m-d')) !!}
</div>
{!! Form::submit($submitButtonText) !!}
