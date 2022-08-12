<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplatesTable extends Migration
{
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('name');
            $table->string('view_path')->nullable();
            $table->mediumText('description')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
}
