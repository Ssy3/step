<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionPlanUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('action_plan_user', function (Blueprint $table) {
            $table->unsignedBigInteger('action_plan_id');
            $table->foreign('action_plan_id', 'action_plan_id_fk_3256410')->references('id')->on('action_plans')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_3256410')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
