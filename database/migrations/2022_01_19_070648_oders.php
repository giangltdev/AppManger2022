<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Oders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Oders', function (Blueprint $table) {
            $table->id();
            $table->string('team')->nullable();
            $table->string('customer')->nullable();
            $table->string('category')->nullable();
            $table->string('tag')->nullable();
            $table->text('content')->nullable();
            $table->text('description')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('pic_id');
            $table->boolean('status')->default(0)->nullable();
            $table->text('return_link')->nullable();
            $table->date('finish_date')->nullable();
            $table->text('comment')->nullable();
            $table->boolean('success')->default(0)->nullable();
            $table->string('pic_social')->nullable();
            $table->boolean('status_social')->default(0)->nullable();
            $table->text('link_social')->nullable();
            $table->date('date_social')->nullable();
            $table->unsignedBigInteger('user_id');
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
        Schema::dropIfExists('Oders');
    }
}
