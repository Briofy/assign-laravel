<?php

namespace Briofy\Assign\Jobs;

use Briofy\Assign\Enums\Status;
use Briofy\Assign\Models\Assign;
use Briofy\Assign\Repositories\IAssignRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class RevokeJob
{
    use Dispatchable, SerializesModels;

    public function __construct(
        private string $unassignedBy,
        private Assign $assign,
    ) {
    }

    public function handle(IAssignRepository $assignRepository): Model
    {
        return $assignRepository->updateModel($this->assign, [
            'unassigned_by' => $this->unassignedBy,
            'status' => Status::Revoked->value,
        ]);
    }
}
