<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->longText('html_code');
            $table->boolean('enabled')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('widgets');
    }
};
