<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Article;
use App\Mailers\ArticleMailer;
use App\Http\Requests\ArticleEmailRequest;

class ArticlesEmailController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function create($articleId)
    {
        $article = Article::findOrFail($articleId);
        return $this->respondTo([
            'html' => view('articles.recommend.create', compact('article'))
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function send($articleId, ArticleMailer $mailer, ArticleEmailRequest $request)
    {
        $article = Article::findOrFail($articleId);
        $mailer->recommendTo($request->input('email'), 'Article recommendation', $article);

        return $this->respondTo([
            'html' => redirect('articles', 303),
            'default' => 'Your article was sent.'
        ]);
    }
}
