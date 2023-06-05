<?php

namespace Briofy\Assign\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'uuid'          => $this->id,
            'assigned_by'   => $this->assigned_by,
            'assignee_type' => $this->assignee_type,
            'assignee_id'   => $this->assignee_id,
            'unassigned_by' => $this->unassigned_by,
            'type'          => $this->type,
            'assignable'    => $this->assignable,
            'status'        => $this->status,
            'expire_at'     => $this->expire_at,
            'note'          => $this->note,
        ];
    }
}
