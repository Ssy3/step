<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration
{
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->integer('probability')->nullable();
            $table->integer('impact')->nullable();
            $table->integer('gross')->nullable();
            $table->string('action')->nullable();
            $table->longText('action_details')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
