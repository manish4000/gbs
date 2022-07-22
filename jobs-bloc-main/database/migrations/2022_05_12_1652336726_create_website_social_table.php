<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteSocialTable extends Migration
{
    public function up()
    {
        Schema::create('website_social', function (Blueprint $table) {

		$table->id();
		$table->string('facebook')->nullable()->default('NULL');
		$table->string('instagram')->nullable()->default('NULL');
		$table->string('twitter')->nullable()->default('NULL');
		$table->string('linkdin')->nullable()->default('NULL');
		$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('website_social');
    }
}