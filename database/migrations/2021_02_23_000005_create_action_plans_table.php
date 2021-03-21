<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActionPlansTable extends Migration
{
    public function up()
    {
        Schema::create('action_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('updates')->nullable();
            $table->string('risks')->nullable();
            $table->string('resources')->nullable();
            $table->date('start')->nullable();
            $table->date('end')->nullable();
            $table->string('approval')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
