<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudyCaseElementContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('study_case_element_contents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content')->nullable();
            $table->unsignedBigInteger('study_case_element_id');
            $table->foreign('study_case_element_id')->references('id')->on('study_case_elements')->onDelete('cascade');
            $table->unsignedBigInteger('study_case_id');
            $table->foreign('study_case_id')->references('id')->on('study_cases')->onDelete('cascade');
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
        Schema::dropIfExists('study_case_element_contents');
    }
}
