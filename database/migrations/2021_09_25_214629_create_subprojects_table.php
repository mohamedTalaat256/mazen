<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubprojectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subprojects', function (Blueprint $table) {
            $table->id();
            $table->text('cover_image');
            $table->text('name');
            $table->text('overview');
            $table->text('status');
            $table->text('area');
            $table->text('location');
            $table->text('type');
            $table->text('installments');
            $table->text('payment_plans');
            $table->text('start_price');
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
        Schema::dropIfExists('subprojects');
    }
}
