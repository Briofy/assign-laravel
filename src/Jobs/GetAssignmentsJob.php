<?php

namespace Briofy\Assign\Jobs;

use Briofy\Assign\Enums\Status;
use Briofy\Assign\Repositories\IAssignRepository;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Queue\SerializesModels;

class GetAssignmentsJob
{
    use Dispatchable, SerializesModels;

    public function __construct(
        private ?string $assignedBy = null,
        private ?bool $revoked = null,
        private ?string $assigneeType = null,
        private ?string $assigneeId = null,
        private ?string $assignableType = null,
        private ?string $assignableId = null,
    ) {
    }

    public function handle(IAssignRepository $assignRepository): LengthAwarePaginator
    {
        $data = [
            'assigned_by' => $this->assignedBy,
            'assignee_type' => $this->assigneeType,
            'assignee_id' => $this->assigneeId,
            'assignable_type' => $this->assignableType,
            'assignable_id' => $this->assignableId,
            'status' => match ($this->revoked) {
                null => null,
                true => Status::Revoked->value,
                false => Status::Assigned->value,
            },
        ];

        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }

        return $assignRepository->getAssignments($data);
    }
}
