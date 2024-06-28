<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_accepts', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('phone');
            $table->string('email');
            $table->string('job_name');
            $table->string('experience');
            $table->integer('notice_period');
            $table->integer('user_id');
            $table->integer('product_id');
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
        Schema::dropIfExists('job_accepts');
    }
};
