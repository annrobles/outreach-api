<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name', 200);
            $table->string('about', 500)->nullable();
            $table->string('link', 200)->nullable();
            $table->string('email', 50)->unique();
            $table->string('availability', 200)->nullable();
            $table->string('contact_number', 15)->nullable();
            $table->bigInteger('status')->nullable();
            $table->timestamps();
        });

        Schema::table('company', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company');
    }
};