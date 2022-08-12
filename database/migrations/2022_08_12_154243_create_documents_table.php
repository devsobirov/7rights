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

            $table->unsignedBigInteger('template_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->json('data');

            $table->foreign('template_id')
                ->references('id')->on('templates')
                ->nullOnDelete()
                ->cascadeOnUpdate();
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
