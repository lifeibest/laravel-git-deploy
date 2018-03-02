<?php
namespace Lifeibest\LaravelGitDeploy\Service;

/**
 * 发布service
 */
class DeployService
{
    public $hook_name = ['push_hooks', 'issue_hooks', 'merge_request_hooks', 'note_hooks', 'tag_push_hooks'];

    public function hook()
    {
        echo 'hook info';
    }
}
