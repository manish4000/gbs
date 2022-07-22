<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_details', function (Blueprint $table) {

            $table->bigInteger('user_id')->length(20)->unsigned();
            $table->string('logo_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->string('profile_image')->nullable();
            $table->date('founded_date')->nullable();
            $table->string('company_name')->nullable();
            $table->string('website')->nullable();
            $table->string('introduction_video_url')->nullable();
            $table->string('employer_job_categories')->nullable();
            $table->text('description')->nullable();
            $table->bigInteger('location_id')->nullable()->length(20)->unsigned();
            $table->tinyText('friendly_address')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('employer_details');
    }
}
