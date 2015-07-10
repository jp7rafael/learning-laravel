<?php
namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;
use App\Author;
use App\Repositories\DbAuthorRepository;

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
    public function create(DbAuthorRepository $repository)
    {
        $authors = $repository->allNames();
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
     * @param  Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        return $this->respondTo([
            'html' => view('articles.show', compact('article')),
            'default' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Article $article
     * @return Response
     */
    public function edit(Article $article, DbAuthorRepository $repository)
    {

        $authors = $repository->allNames();

        return $this->respondTo([
            'html' => view('articles.edit', compact('article', 'authors')),
            'default' => ['_token' => csrf_token()]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Article $article
     * @return Response
     */
        public function update(Article $article, ArticleRequest $request)
        {
            $article->update($request->all());

            return $this->respondTo([
                'html' => redirect('articles'),
                'default' => 'Your article was updated with success'
            ]);

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Article $article
     * @return Response
     */
        public function destroy(Article $article)
        {
            $article->delete();

            return $this->respondTo([
                'html' => redirect('articles', 303),
                'default' => 'Your article was removed with success'

            ]);
        }
}
