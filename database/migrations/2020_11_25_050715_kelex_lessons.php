<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KelexLessons extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelex_lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('weekday')->nullable();;
            $table->time('start_time')->nullable();;
            $table->time('end_time')->nullable();;
            $table->unsignedBigInteger('EMP_ID')->nullable();
            $table->foreign('EMP_ID')->references('EMP_ID')->on('kelex_employees');
            $table->unsignedBigInteger('CLASS_ID')->nullable();
            $table->foreign('CLASS_ID')->references('Class_id')->on('kelex_classes');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kelex_lessons');
    }
}
