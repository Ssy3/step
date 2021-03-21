<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRisksTable extends Migration
{
    public function up()
    {
        Schema::table('risks', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3256421')->references('id')->on('teams');
            $table->unsignedBigInteger('initiative_id')->nullable();
            $table->foreign('initiative_id', 'initiative_fk_3256422')->references('id')->on('initiatives');
        });
    }
}
