<?php

namespace Briofy\Assign\Models;

use Briofy\Assign\Enums\Status;
use Carbon\Carbon;
use Database\Factories\AssignFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Assign extends Model
{
    use HasUuids, HasFactory, SoftDeletes;

    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setConnection(config('briofy-assign.assigns.db_connection'));
    }

    protected static function newFactory()
    {
        return AssignFactory::new();
    }

    public function getStatusAttribute($value)
    {
        if (! is_null($this->expire_at) && Carbon::createFromFormat('Y-m-d H:i:s', $this->expire_at)->isPast()) {
            return Status::Expired->value;
        }

        return $value;
    }

    public function assigee()
    {
        return $this->morphTo();
    }

    public function assignable()
    {
        return $this->morphTo();
    }
}
