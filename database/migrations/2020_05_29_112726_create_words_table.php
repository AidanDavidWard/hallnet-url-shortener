<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWordsTable extends Migration
{
    public function up()
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15)->unique();
            $table->boolean('used')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('words');
    }
}
