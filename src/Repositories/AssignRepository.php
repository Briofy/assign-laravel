<?php

namespace Briofy\Assign\Repositories;

use Briofy\Assign\Models\Assign;
use Briofy\RepositoryLaravel\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;

class AssignRepository extends AbstractRepository implements IAssignRepository
{
    protected function instance(array $attributes = []): Model
    {
        return new Assign();
    }
}
