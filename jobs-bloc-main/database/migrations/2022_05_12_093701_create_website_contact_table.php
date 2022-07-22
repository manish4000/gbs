<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsiteContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_contact', function (Blueprint $table) {
        $table->id();
        $table->string('email')->nullable()->default('NULL');
		$table->string('address')->nullable()->default('NULL');
		$table->string('phone')->nullable()->default('NULL');
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
        Schema::dropIfExists('website_contact');
    }
}
