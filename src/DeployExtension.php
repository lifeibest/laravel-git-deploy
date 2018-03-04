<?php

namespace Lifeibest\LaravelGitDeploy;

use Encore\Admin\Admin;
use Encore\Admin\Auth\Database\Menu;
use Encore\Admin\Extension;

/**
 * not use
 */
class DeployExtension extends Extension
{

    /**
     * Bootstrap this package.
     *
     * @return void
     */
    public static function boot()
    {
        static::registerRoutes();

        Admin::extend('deploy', __CLASS__);
    }

    /**
     * Register routes for laravel-admin.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        //parent::createMenu('Git task', 'git-task', 'fa-toggle-on');
        //
        $lastOrder = Menu::max('order');
        $root = [
            'parent_id' => 0,
            'order' => $lastOrder++,
            'title' => 'Git deploy',
            'icon' => 'fa-tasks',
            'uri' => '',
        ];
        $root = Menu::create($root);
        $menus = [
            [
                'title' => 'Git task',
                'icon' => 'fa-tasks',
                'uri' => 'git-task',
            ],
            [
                'title' => 'Git hock',
                'icon' => 'fa-terminal',
                'uri' => 'git-hock',
            ],
            [
                'title' => 'Git config',
                'icon' => 'fa-wrench',
                'uri' => 'git-config',
            ],
        ];
        foreach ($menus as $menu) {
            $menu['parent_id'] = $root->id;
            $menu['order'] = $lastOrder++;
            Menu::create($menu);
        }

        parent::createPermission('Git deploy', 'ext.deploy', 'git*');
    }
}
