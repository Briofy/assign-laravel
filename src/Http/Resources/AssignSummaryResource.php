<?php

namespace Briofy\Assign\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignSummaryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'uuid'   => $this->id,
            'type'   => $this->type,
            'status' => $this->status,
        ];
    }
}
