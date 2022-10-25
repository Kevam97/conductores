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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('epayco_id')->nullable();
            $table->string('name');
            $table->string('lastname');
            $table->string('documentType');
            $table->string('document');
            $table->string('address');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('town');
            $table->date('birth');
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
