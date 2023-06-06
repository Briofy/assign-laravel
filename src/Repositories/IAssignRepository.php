<?php

namespace Briofy\Assign\Repositories;

use Illuminate\Pagination\LengthAwarePaginator;

interface IAssignRepository
{
    public function checkIsAssigned(string $assigneeType, string $assigneeId, string $assignableType, string $assignableId): bool;

    public function getAssignments(array $attributes): LengthAwarePaginator;
}
