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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->nullable()->constrained();
            $table->foreignId('line_id')->nullable()->constrained();
            $table->foreignId('owner_id')->nullable()->constrained();
            $table->string('model');
            $table->string('vehicle_registration');
            $table->string('payout');
            $table->string('days_off');
            $table->boolean('social_benefits');
            $table->string('company');
            $table->string('requirements');
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
        Schema::dropIfExists('vehicles');
    }
};
