<?php
namespace Lifeibest\LaravelGitDeploy\Console;

use Illuminate\Console\Command;

class TaskCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'git-deploy:task';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'git-deploy task';
    /**
     * Install directory.
     *
     * @var string
     */
    protected $directory = '';
    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        echo 'run task';
    }

}
