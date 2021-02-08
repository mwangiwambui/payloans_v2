<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuarantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('guarantors');
        Schema::create('guarantors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guarantor_id')->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('user_id');
            $table->tinyInteger('approved');
            $table->text('tracking_number');
            $table->timestamps();

            $table->unique(['guarantor_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guarantors');
    }
}
