<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerShortlistResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employer_shortlist_resume', function (Blueprint $table) {
        
            $table->id();
            $table->bigInteger('employer_id')->length(20)->unsigned();
            $table->bigInteger('candidate_id')->length(20)->unsigned();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('candidate_id')->references('id')->on('users')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employer_shortlist_resume');
    }
}
