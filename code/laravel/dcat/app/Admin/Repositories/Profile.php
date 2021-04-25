<?php

namespace App\Admin\Repositories;

use App\Models\Profile as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Profile extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
