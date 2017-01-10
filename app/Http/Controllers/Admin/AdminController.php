<?php

namespace App\Http\Controllers\Admin;

use App\Repository\AdminRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    protected $admin;

    /**
     * AdminController constructor.
     * @param AdminRepository $admin
     */
    public function __construct(AdminRepository $admin)
    {
        $this->middleware('auth');
        $this->admin = $admin;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin');
    }

    /**
     * @return array
     */
    public function dashboard()
    {
        return $this->admin->dashboardcount();
    }

    /**
     * @return mixed
     */
    public function admininfo()
    {
        return $this->admin->getinfo();
    }

    /**
     * @return mixed
     */
    public function usersinfo()
    {
        return $this->admin->allusersinfo();
    }

    /**
     * @return mixed
     */
    public function allarticles()
    {
        return $this->admin->articles();
    }

    /**
     * @return mixed
     */
    public function commentsinfo()
    {
        return $this->admin->comments();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editusershow($id)
    {
        return $this->admin->singleuser($id);
    }

    /**
     * @param $id
     * @param Request $request
     * @return array
     */
    public function updateuser($id, Request $request)
    {
        return $this->admin->updatesingleuser($id, $request->all());
    }

    /**
     * @param $id
     * @return array
     */
    public function deleteuser($id)
    {
        return $this->admin->deletesingleuser($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editcommentshow($id)
    {
        return $this->admin->singlecomment($id);
    }

    /**
     * @param $id
     * @param Request $request
     * @return array
     */
    public function updatecomment($id, Request $request)
    {
        return $this->admin->updatesinglecomment($id, $request->all());
    }

    /**
     * @param $id
     * @return array
     */
    public function deletecomment($id)
    {
        return $this->admin->deletesinglecomment($id);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function uploadarticle(Request $request)
    {
        return $this->admin->uploadsinglearticle($request->all());
    }

    /**
     * @param $id
     * @return mixed
     */
    public function editarticle($id)
    {
        return $this->admin->editsinglearticle($id);
    }

    /**
     * @param $id
     * @param Request $request
     */
    public function updatearticle($id, Request $request)
    {
        $this->admin->updatesinglearticle($id, $request->all());
    }

    /**
     * @param $id
     * @return array
     */
    public function deletearticle($id){
        return $this->admin->deletesinglearticle($id);
    }
}
