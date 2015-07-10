<?php namespace App\Mailers;

use Mail;
use App\Article;

class ArticleMailer
{

    public function recommendTo($email, $subject, Article $article)
    {
        Mail::queue('emails.article', ['article' => $article], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
}
