<?php
namespace Lifeibest\LaravelGitDeploy;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class GitDeployServiceProvider extends ServiceProvider
{

    /**
     * @var array
     */
    protected $commands = [
        'Lifeibest\LaravelGitDeploy\Console\TaskCommand',
    ];

    /**
     * {@inheritdoc}
     */
    public function boot()
    {

        $this->registerRoutes();
        $this->registerResources();
        $this->definePublishing();

        //$this->registerCommands();

        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands($this->commands);
    }

    /**
     * Register the   manager routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
        Route::group([
            'prefix' => 'admin',
            'namespace' => 'Lifeibest\LaravelGitDeploy\Admin\Http\Controllers',
            'middleware' => config('git-deploy.middleware', ['web', 'admin']),
        ], function () {
            Route::get('/git-task', 'GitTaskController@index');
        });

        // parent::routes(function ($router) {
        //     /* @var \Illuminate\Routing\Router $router */
        //     $router->get('git-task', 'Lifeibest\LaravelGitDeploy\Admin\Http\Controllers\GitTaskController@index')->name('git-task');
        // });

        Route::group([
            'prefix' => config('git-deploy.base_path', 'git-deploy'),
            'namespace' => 'Lifeibest\LaravelGitDeploy\Http\Controllers',
            'middleware' => config('git-deploy.middleware', 'web'),
        ], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });
    }
    /**
     * Register the   manager resources.
     *
     * @return void
     */
    protected function registerResources()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'git-deploy');
    }
    /**
     * Define the publishing.
     *
     * @return void
     */
    public function definePublishing()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/git-deploy.php' => config_path('git-deploy.php'),
            ], 'git-deploy-config');
        }
    }
}
