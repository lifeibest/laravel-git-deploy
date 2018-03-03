<?php
namespace Lifeibest\LaravelGitDeploy\Admin\Http\Controllers;

use App\Models\Systemconfig;
use App\Models\SystemconfigType;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

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

            $content->header('配置');
            $content->description('列表');

            // 面包屑导航
            $content->breadcrumb(
                ['text' => '配置列表', 'url' => '/systemconfig'],
                ['text' => '配置']
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
        return Admin::grid(Systemconfig::class, function (Grid $grid) {

            $grid->id('ID')->sortable();

            //$grid->model()->with('systemconfigType')->orderBy('id', 'DESC');

            // $grid->column('systemconfig_type_id', '配置类型')->display(function ($systemconfig_type_id) {
            //     return systemconfigType::find($systemconfig_type_id)->name;
            // });

            $grid->column('systemconfigType.name', '配置类型'); //同上功能

            $grid->name('配置名称');
            $grid->keyword('标识符');
            $grid->value1('值');
            $grid->is_open('开关');

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
                $filter->equal('systemconfig_type_id', '配置类型')->select(systemconfigType::all()->pluck('name', 'id'));
                $filter->like('name', '配置名称');
                $filter->like('keyword', '关键字');
                $filter->like('value1', '值1');
                $filter->like('value2', '值2');
                $filter->like('value3', '值3');

            });
        });
    }

}
