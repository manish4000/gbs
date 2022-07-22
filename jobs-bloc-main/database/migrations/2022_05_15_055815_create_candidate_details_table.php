<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_details', function (Blueprint $table) {

     
            $table->bigInteger('user_id')->length(20)->unsigned();
            $table->string('featured_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->date('dob')->nullable();
            $table->string('job_title')->nullable();
            $table->string('salary')->nullable();
            $table->bigInteger('salary_type_id')->nullable()->length(20)->unsigned();
            $table->string('introduction_video_url')->nullable();
            $table->string('candidate_job_categories')->nullable();

            $table->text('description')->nullable();
            $table->bigInteger('location_id')->nullable()->length(20)->unsigned();
            $table->tinyText('friendly_address')->nullable();
            $table->string('candidate_tags')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('candidate_details');
    }
}
