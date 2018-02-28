<?php
namespace Lifeibest\LaravelGitDeploy;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class GitDeployServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {

        $this->registerRoutes();
        $this->registerResources();
        $this->definePublishing();

    }
    /**
     * Register the   manager routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {
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
