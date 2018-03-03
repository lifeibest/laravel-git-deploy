<?php
namespace Lifeibest\LaravelGitDeploy\Admin\Http\Controllers;

use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Lifeibest\LaravelGitDeploy\Models\GitTaskModel;

class GitTaskController extends Controller
{
    // /admin/git-task
    public function index1(Request $request)
    {
        return view('git-deploy::app');
    }

    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('Git task');
            $content->description('list');

            // 面包屑导航
            $content->breadcrumb(
                ['text' => 'Git task', 'url' => '/git-task'],
                ['text' => 'detail']
            );
            $content->body($this->grid());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(GitTaskModel::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            //$grid->model()->with('systemconfigType')->orderBy('id', 'DESC');

            // $grid->column('systemconfig_type_id', '配置类型')->display(function ($systemconfig_type_id) {
            //     return systemconfigType::find($systemconfig_type_id)->name;
            // });

            $grid->created_at('创建时间')->sortable();
            $grid->updated_at('更新时间')->sortable();

            // $grid->actions(function (Grid\Displayers\Actions $actions) {
            //     if ($actions->getKey() == 1) {
            //         $actions->disableDelete();
            //     }
            // });
            // 禁止批量删除
            $grid->tools(function (Grid\Tools $tools) {
                $tools->batch(function (Grid\Tools\BatchActions $actions) {
                    $actions->disableDelete();
                });
            });

            $grid->actions(function ($actions) {
                $actions->disableDelete();
            });

            $grid->filter(function ($filter) {
                $filter->disableIdFilter();

            });
        });
    }

}
