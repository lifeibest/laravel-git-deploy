<?php
namespace Lifeibest\LaravelGitDeploy\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class GitDeployController extends BaseController
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
    }
    /**
     * Index page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('git-deploy::app');
    }

}
