<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('account__details');
        Schema::create('account__details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total_amount');
            $table->date('last_withdrawn')->nullable();
            $table->date('last_deposited')->nullable();
            $table->foreignId('user_id');
            $table->timestamps();

            $table->unique('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account__details');
    }
}
