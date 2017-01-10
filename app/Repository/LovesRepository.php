<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 2017/1/8
 * Time: 下午6:36
 */

namespace App\Repository;

use App\Love;

class LovesRepository
{
    /**
     * @param $id
     * @return string
     */
    public function lovefont($id){
        if(\Auth::user()->userloved($id)){
            $font="已收藏";
        }else{
            $font="收藏";
        }
        return $font;
    }

    /**
     * @return mixed
     */
    public function ByUserId(){
        return Love::where('user_id',\Auth::id())->get();
    }
}