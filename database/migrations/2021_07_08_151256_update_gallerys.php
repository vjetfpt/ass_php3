<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGallerys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gallerys', function (Blueprint $table) {
            $table->foreignId('tour_id')->constrained('tours');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('gallerys', function (Blueprint $table) {
            $table->dropForeign(['tour_id']);
        });
    }
}
