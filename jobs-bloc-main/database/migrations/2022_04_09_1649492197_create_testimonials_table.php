<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialsTable extends Migration
{
    public function up()
    {
        Schema::create('testimonials', function (Blueprint $table) {
		$table->id();
		$table->text('description');
		$table->string('image');
		$table->string('name');
		$table->string('designation');
		$table->string('location');
		$table->tinyInteger('star');
		$table->boolean('is_active');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonials');
    }
}