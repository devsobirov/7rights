<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
//
//            $table->string('name');
//            $table->string('template')->nullable();
//            $table->mediumText('description')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
