<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGoalsTable extends Migration
{
    public function up()
    {
        Schema::table('goals', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id');
            $table->foreign('team_id', 'team_fk_3256364')->references('id')->on('teams');
            $table->unsignedBigInteger('strategic_plan_id')->nullable();
            $table->foreign('strategic_plan_id', 'strategic_plan_fk_3256366')->references('id')->on('strategic_plans');
        });
    }
}
