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
        Schema::create('writers', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_bn');
            $table->string('phone_en');
            $table->string('phone_bn');
            $table->string('dob_en');
            $table->string('dob_bn');
            $table->string('dod_en')->nullable();
            $table->string('dod_bn')->nullable();
            $table->longText('history_of_life_en');
            $table->longText('history_of_life_bn');
            $table->longText('description_en');
            $table->longText('description_bn');
            $table->string('email');
            $table->string('image')->nullable();
            $table->enum('status',[0,1])->default(1);
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
        Schema::dropIfExists('writers');
    }
};
