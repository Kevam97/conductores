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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->string('name');
            $table->string('lastname');
            $table->string('documentType');
            $table->string('document');
            $table->string('address');
            $table->string('phone');
            $table->string('email');
            $table->string('country');
            $table->string('town');
            $table->date('birth');
            $table->foreignId('healthCompany_id')->nullable()->constrained();
            $table->date('experience_year');
            $table->string('driving_license');
            $table->date('license_expiration');
            $table->boolean('status');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};
