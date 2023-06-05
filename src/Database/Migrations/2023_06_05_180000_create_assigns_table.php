<?php

use Briofy\Assign\Enums\Status;
use Briofy\Assign\Enums\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection(config('briofy-assign.assigns.db_connection'))
            ->create('assigns', function (Blueprint $table) {
                $table->uuid('id')->primary();
                $table->string('assigned_by');
                $table->string('assignee_type');
                $table->string('assignee_id');
                $table->string('unassigned_by')->nullable();
                $table->unsignedSmallInteger('type')->default(Type::Owner->value);
                $table->uuidMorphs('assignable');
                $table->unsignedSmallInteger('status')->default(Status::Assigned->value);
                $table->timestamp('expire_at')->nullable();
                $table->string('note')->nullable();
                $table->timestamps();
                $table->softDeletes();

                $table->index(['assignable_type', 'assigned_by']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection(config('briofy-assign.assigns.db_connection'))->dropIfExists('assigns');
    }
};