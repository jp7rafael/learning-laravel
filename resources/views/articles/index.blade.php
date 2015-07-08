@extends($remote ? 'layouts.ajax' : 'layouts.html')

@section('content')
    <h1>Articles</h1>
    {!! link_to_route('articles.create', 'New Article', null, ['class' => 'btn btn-primary btn-lg', 'data-remote' => 'true']) !!}
    <table class="table">
        <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>Title</th>
        </tr>
        @foreach ($articles as $article)
            <tr>
                <td>{!! link_to_route('articles.edit', 'Edit', $article->id, ['class'=> 'btn btn-default', 'data-remote' => 'true']) !!}</td>
                <td>
                    {!! link_to_route('articles.destroy', 'Delete', $article->id, 
                    ['data-method' => 'DELETE', 'data-remote' => 'true', 'class' => 'btn btn-warning']) !!}
                </td>
                <td>{!! link_to_route('articles.show', $article->title, $article->id, ['data-remote' => 'true']) !!}</td>
            </tr>
        @endforeach
    </table>
@endsection
