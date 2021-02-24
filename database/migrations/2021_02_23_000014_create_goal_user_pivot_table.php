<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('goal_user', function (Blueprint $table) {
            $table->unsignedBigInteger('goal_id');
            $table->foreign('goal_id', 'goal_id_fk_3256365')->references('id')->on('goals')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_3256365')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
