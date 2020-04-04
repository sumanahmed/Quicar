<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->unsignedBigInteger('car_type_id')->nullable();
            $table->string('name');
            $table->string('registration_no');
            $table->string('sit_capacity');
            $table->string('daily_price')->nullable();
            $table->string('weekly_price')->nullable();
            $table->string('monthly_price')->nullable();
            $table->unsignedBigInteger('district_id')->nullable();
            $table->unsignedBigInteger('upazila_id')->nullable();
            $table->text('front_image');
            $table->text('inside_image')->nullable();
            $table->text('back_image')->nullable();
            $table->tinyInteger('approval_status')->default(0)->comment('0=Unapproved,1=Approved');
            $table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('driver_id')->references('id')->on('drivers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('cars');
    }
}
