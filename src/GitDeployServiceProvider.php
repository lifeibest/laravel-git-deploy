<?php
namespace Lifeibest\GitDeploy;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class GitDeployServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        // $this->registerRoutes();
        // $this->registerResources();
        // $this->definePublishing();
        //
    }
    /**
     * Register the Redis manager routes.
     *
     * @return void
     */
    protected function registerRoutes()
    {

    }
    /**
     * Register the Redis manager resources.
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

    }
}
