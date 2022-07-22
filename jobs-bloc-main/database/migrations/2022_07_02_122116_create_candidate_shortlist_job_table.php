<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidateShortlistJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidate_shortlist_job', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->length(20)->unsigned();
            $table->bigInteger('job_id')->length(20)->unsigned();
            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidate_shortlist_job');
    }
}
