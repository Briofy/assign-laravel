<?php

namespace Briofy\Assign\Jobs;

use Briofy\Assign\Enums\Status;
use Briofy\Assign\Repositories\IAssignRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class AssignJob
{
    use Dispatchable, SerializesModels;

    public function __construct(
        private string $assignedBy,
        private string $assigneeType,
        private string $assigneeId,
        private Model $assignable,
        private array $data,
    ) {
    }

    public function handle(IAssignRepository $assignRepository): Model
    {
        return $assignRepository->create(array_merge($this->data, [
            'assigned_by' => $this->assignedBy,
            'assignee_type' => $this->assigneeType,
            'assignee_id' => $this->assigneeId,
            'assignable_type' => $this->assignable::class,
            'assignable_id' => $this->assignable->id,
            'status' => Status::Assigned->value,
        ]))->refresh();
    }
}
