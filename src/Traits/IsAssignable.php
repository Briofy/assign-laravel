<?php

namespace Briofy\Assign\Traits;

use Briofy\Assign\Models\Assign;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait IsAssignable
{
    public function assignments(): MorphMany
    {
        return $this->morphMany(Assign::class, 'assignable');
    }
}
