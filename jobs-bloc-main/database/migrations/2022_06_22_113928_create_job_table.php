<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('job_type_id')->length(20)->unsigned();
            $table->text('description');
            $table->string('feature_image');
            $table->date('application_deadline_date');
            $table->string('min_salary');
            $table->string('max_salary');
            $table->bigInteger('salary_type_id')->length(20)->unsigned();
            $table->tinyText('tegs');
            $table->bigInteger('location_id')->length(20)->unsigned();
            $table->tinyText('address');
            $table->boolean('is_active');
            $table->boolean('is_feature');
            $table->timestamps();
            $table->foreign('job_type_id')->references('id')->on('job_types')->onDelete('cascade');
            $table->foreign('salary_type_id')->references('id')->on('salary_types')->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job');
    }
}
