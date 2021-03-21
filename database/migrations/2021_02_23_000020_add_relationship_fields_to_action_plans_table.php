<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToActionPlansTable extends Migration
{
    public function up()
    {
        Schema::table('action_plans', function (Blueprint $table) {
            $table->unsignedBigInteger('initiative_id');
            $table->foreign('initiative_id', 'initiative_fk_3256399')->references('id')->on('initiatives');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3256409')->references('id')->on('teams');
        });
    }
}
