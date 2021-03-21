<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitiativeUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('initiative_user', function (Blueprint $table) {
            $table->unsignedBigInteger('initiative_id');
            $table->foreign('initiative_id', 'initiative_id_fk_3256395')->references('id')->on('initiatives')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id', 'user_id_fk_3256395')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
