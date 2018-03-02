<?php
namespace Lifeibest\LaravelGitDeploy\Admin\Http\Controllers;

use Encore\Admin\Facades\Admin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GitTaskController extends Controller
{
    // /admin/git-task
    public function index(Request $request)
    {
        return view('git-deploy::app');
    }

}
