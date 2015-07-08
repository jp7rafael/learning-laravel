<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Author;

class ArticlesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $articles = Article::all();

        return $this->respondTo([
            'html' => view('articles.index', compact('articles')),
            'default' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $authors = Author::lists('name', 'id')->all();

        $article = new Article;

        return $this->respondTo([
            'html' => view('articles.create', compact('article', 'authors')),
            'default' => ['_token' => csrf_token()]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());
        
        return $this->respondTo([
            'html' => redirect('articles'),
            'default' => 'Your article was stored with success'
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
        $article = Article::findOrFail($id);

        return $this->respondTo([
            'html' => view('articles.show', compact('article')),
            'default' => $article
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
        $article = Article::findOrFail($id);
        $authors = Author::lists('name', 'id')->all();

        return $this->respondTo([
            'html' => view('articles.edit', compact('article', 'authors')),
            'default' => ['_token' => csrf_token()]
        ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
        public function update($id, ArticleRequest $request)
        {
                $article = Article::findOrFail($id);
                $article->update($request->all());

                return $this->respondTo([
            'html' => redirect('articles'),
            'default' => 'Your article was updated with success'
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
            $article = Article::findOrFail($id);
            $article->delete();

            return $this->respondTo([
            'html' => redirect('articles', 303),
            'default' => 'Your article was removed with success'
            ]);
        }
}
