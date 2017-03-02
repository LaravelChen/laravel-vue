<?php

namespace App\Http\Controllers;

use App\Repository\VotesRepository;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    protected $thumb;

    /**
     * VotesController constructor.
     * @param VotesRepository $vote
     */
    public function __construct(VotesRepository $vote)
    {
        $this->thumb = $vote;
        $this->middleware('auth')->except('votecount');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function vote(Request $request)
    {
        \Auth::user()->votethis($request->get('article_id'));
        $this->thumb->AddandDe($request->get('article_id'));
        return [
            'count' => $this->thumb->ByArticleVoteCount($request->get('article_id')),
            'fonts' => $this->thumb->votefont($request->get('article_id')),
        ];
    }

    /**
     * @param Request $request
     * @return array
     */
    public function votecount(Request $request)
    {
        return [
            'count' => $this->thumb->ByArticleVoteCount($request->get('article_id')),
            'fonts' => $this->thumb->votefont($request->get('article_id')),
        ];
    }
}
