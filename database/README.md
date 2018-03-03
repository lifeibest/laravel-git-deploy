php artisan make:migration --path vendor/lifeibest/laravel-git-deploy/database/migrations create_git_hook_table --create=git_hook

php artisan make:migration --path vendor/lifeibest/laravel-git-deploy/database/migrations create_git_task_table --create=git_task

php artisan make:migration --path vendor/lifeibest/laravel-git-deploy/database/migrations create_git_config_table --create=git_config

php artisan make:migration or php artisan migrate --path=vendor/lifeibest/laravel-git-deploy/database/migrations

php artisan migrate:rollback
