<?php

namespace App\Http\Controllers;

use App\Repository\ArticlesRepository;


class ArticlesController extends Controller
{
    protected $article;

    /**
     * ArticlesController constructor.
     * @param ArticlesRepository $article
     */
    public function __construct(ArticlesRepository $article)
    {
        $this->article = $article;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('blog');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function allarticle()
    {
        return $this->article->ByAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function singlearticle($id)
    {
        $result = $this->article->Byid($id);
        $result->author = 'LaravelChen';
        $result->time = $result->updated_at->toDateString();
        return $result;
    }
}
