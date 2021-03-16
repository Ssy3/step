<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitiativesTable extends Migration
{
    public function up()
    {
        Schema::create('initiatives', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->longText('kpi_description')->nullable();
            $table->string('kpi_previous')->nullable();
            $table->date('kpi_previous_date')->nullable();
            $table->string('kpi_current')->nullable();
            $table->date('kpi_current_date')->nullable();
            $table->string('kpi_target')->nullable();
            $table->date('kpi_target_date')->nullable();
            $table->string('status')->nullable();
            $table->longText('why_if_not_accomplished')->nullable();
            $table->longText('dod_comment')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
