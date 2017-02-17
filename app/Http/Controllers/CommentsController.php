<?php
namespace App\Http\Controllers;
use App\Article;
use App\Comment;
class CommentsController extends Controller
{
    public function store(Article $article)
    {
        $article->addComment(request('body'));

        return back();
    }
}