<?php

namespace Briofy\Assign\Repositories;

use Briofy\Assign\Enums\Status;
use Briofy\Assign\Models\Assign;
use Briofy\RepositoryLaravel\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class AssignRepository extends AbstractRepository implements IAssignRepository
{
    protected function instance(array $attributes = []): Model
    {
        return new Assign();
    }

    public function checkIsAssigned(
        string $assigneeType,
        string $assigneeId,
        string $assignableType,
        string $assignableId
    ): bool
    {
        return $this->model->query()
            ->where([
                'assignee_type' => $assigneeType,
                'assignee_id' => $assigneeId,
                'assignable_type' => $assignableType,
                'assignable_id' => $assignableId,
                'status' => Status::Assigned->value,
            ])
            ->where('expire_at', '>', now()->format('Y-m-d H:i:s'))
            ->exists();
    }

    public function getAssignments(array $attributes): LengthAwarePaginator
    {
        return $this->model->query()
            ->where($attributes)
            ->paginate();
    }
}
