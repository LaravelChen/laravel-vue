<?php

namespace App\Http\Controllers;


use App\Repository\LovesRepository;

class LovesController extends Controller
{
    /**
     * @var LovesRepository
     */
    protected $userlove;

    /**
     * LovesController constructor.
     * @param LovesRepository $love
     */
    public function __construct(LovesRepository $love)
    {
        $this->userlove = $love;
        $this->middleware('auth');
    }

    /**
     * @param $id
     * @return array
     */
    public function lovefont($id){
        return [
            'lovefont'=>$this->userlove->lovefont($id),
        ];
    }


    /**
     * @param $id
     * @return array
     */
    public function lovesub($id){
        \Auth::user()->userlovethis($id);
        return [
            'lovefont'=>$this->userlove->lovefont($id),
        ];
    }

    /**
     * @return mixed
     */
    public function lovetotal(){
        $total= $this->userlove->ByUserId();
        foreach($total as $love){
            $love->title=$love->article->title;
        }
        return $total;
    }
}
