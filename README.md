# laravel-git-deploy
laravel git 发布系统


# Installation

You may use Composer to install laravel-git-deploy into your Laravel project:

```shell
composer require lifeibest/laravel-git-deploy:dev-master

```

After installing `laravel-git-deploy`, publish its config using the vendor:publish Artisan command:

```shell
php artisan vendor:publish --provider="Lifeibest\LaravelGitDeploy\GitDeployServiceProvider"
```

migrate database

```shell
php artisan migrate
```
