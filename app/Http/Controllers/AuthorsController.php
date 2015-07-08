<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Http\Controllers\Controller;
use App\Author;

class AuthorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $authors = Author::all();
        return $this->respondTo([
            'html' => view('authors.index', compact('authors')),
            'default' => $authors
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return $this->respondTo([
            'html' => view('authors.create'),
            'default' => ['_token' => csrf_token()]
        ]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
public function store(AuthorRequest $request)    {
        $author = Author::create($request->all());
        return $this->respondTo([
            'html' => redirect('authors'),
            'default' => 'Your author was stored with success'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $author = Author::findOrFail($id);

        return $this->respondTo([
            'html' => view('authors.show', compact('author')),
            'default' => $author
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $author = Author::findOrFail($id);
        return $this->respondTo([
            'html' => view('authors.edit', compact('author')),
            'default' => ['_token' => csrf_token()]
        ]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
public function update($id, AuthorRequest $request)    {
        $author = Author::findOrFail($id);
        $author->update($request->all());
        return $this->respondTo([
            'html' => redirect('authors'),
            'default' => 'Your author was updated with success'
        ]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return $this->respondTo([
            'html' => redirect('authors', 303),
            'default' => 'Your author was removed with success'
        ]);
    }
}
