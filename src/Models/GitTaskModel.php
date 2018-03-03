<?php

namespace Lifeibest\LaravelGitDeploy\Models;

use Illuminate\Database\Eloquent\Model;

class GitTaskModel extends Model
{
    /**
     * Settings constructor.
     *
     * @param array $attributes
     */
    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        $this->setConnection(config('admin.database.connection') ?: config('database.default'));

        $this->setTable('git_task');
    }
}
