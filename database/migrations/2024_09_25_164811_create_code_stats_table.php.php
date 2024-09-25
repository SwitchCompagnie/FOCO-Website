<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCodeStatsTable extends Migration
{
    public function up()
    {
        Schema::create('code_stats', function (Blueprint $table) {
            $table->id();
            $table->integer('original_length');
            $table->integer('beautified_length');
            $table->text('original_code');
            $table->text('beautified_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('code_stats');
    }
}