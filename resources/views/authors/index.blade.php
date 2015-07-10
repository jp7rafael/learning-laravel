@extends($template)

@section('content')
    <h1>Authors</h1>
    {!! link_to_route('authors.create', 'New Author', null, ['class' => 'btn btn-primary btn-lg', 'data-remote' => 'true']) !!}
    <table class="table">
        <tr>
            <th>Edit</th>
            <th>Delete</th>
            <th>Name</th>
        </tr>
        @foreach ($authors as $author)
            <tr>
                <td>{!! link_to_route('authors.edit', 'Edit', $author->id, ['class'=> 'btn btn-default', 'data-remote' => 'true']) !!}</td>
                <td>
                    {!! link_to_route('authors.destroy', 'Delete', $author->id, 
                    ['data-method' => 'DELETE', 'data-remote' => 'true', 'class' => 'btn btn-warning']) !!}
                </td>
                <td>{!! link_to_route('authors.show', $author->name, $author->id, 
                ['data-remote' => 'true']) !!}</td>
            </tr>
        @endforeach
    </table>
@endsection
