<?php

namespace Briofy\Assign\Jobs;

use Briofy\Assign\Enums\Status;
use Briofy\Assign\Repositories\IAssignRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CheckIsAssignedJob
{
    use Dispatchable, SerializesModels;

    public function __construct(
        private string $assigneeType,
        private string $assigneeId,
        private Model $assignable,
    ) {
    }

    public function handle(IAssignRepository $assignRepository): bool
    {
        return $assignRepository->checkIsAssigned(
            $this->assigneeType,
            $this->assigneeId,
            $this->assignable::class,
            $this->assignable->id
        );
    }
}
