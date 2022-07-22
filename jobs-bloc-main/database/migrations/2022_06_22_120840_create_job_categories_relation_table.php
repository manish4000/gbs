<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobCategoriesRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_categories_relation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('job_id')->length(20)->unsigned();
            $table->bigInteger('job_category_id')->length(20)->unsigned();
            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
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
        Schema::dropIfExists('job_categories_relation');
    }
}
