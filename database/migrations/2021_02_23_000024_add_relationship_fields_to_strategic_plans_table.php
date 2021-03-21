<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToStrategicPlansTable extends Migration
{
    public function up()
    {
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3256357')->references('id')->on('teams');
        });
    }
}
