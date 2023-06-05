<?php

namespace Database\Factories;

use Briofy\Assign\Enums\Status;
use Briofy\Assign\Enums\Type;
use Briofy\Assign\Models\Assign;
use Illuminate\Database\Eloquent\Factories\Factory;

class AssignFactory extends Factory
{
    protected $model = Assign::class;

    public function definition()
    {
        return [
            'assigned_by' => str()->uuid()->toString(),
            'assignee_type' => 'App\\Models\\User',
            'assignee_id' => str()->uuid()->toString(),
            'unassigned_by' => null,
            'type' => array_rand(Type::toArray()),
            'assignable_type' => 'App\\Models\\Model',
            'assignable_id' => str()->uuid()->toString(),
            'status' => array_rand(Status::toArray()),
            'expire_at' => now()->format('Y-m-d H:i:s'),
            'note' => $this->faker->word(),
        ];
    }
}
