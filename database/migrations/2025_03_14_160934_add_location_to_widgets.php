<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('widgets', function (Blueprint $table) {
            $table->enum('location', ['head', 'body'])
                ->before('html_code')
                ->default('body');
        });
    }

    public function down()
    {
        Schema::table('widgets', function (Blueprint $table) {
            $table->dropColumn('location');
        });
    }
};
