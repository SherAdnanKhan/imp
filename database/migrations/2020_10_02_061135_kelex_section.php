<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KelexSection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Kelex_Sections', function (Blueprint $table) {
            $table->id('Section_id');
            $table->string('Section_name')->nullable();
            $table->unsignedBigInteger('Class_id')->nullable();
            $table->unsignedBigInteger('Campus_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
