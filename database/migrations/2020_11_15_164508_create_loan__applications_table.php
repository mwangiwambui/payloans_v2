<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan__applications', function (Blueprint $table) {
            $table->id();
            $table->string('married');
            $table->string('dependants');
            $table->string('education');
            $table->string('self_employed');
            $table->string('employer_name');
            $table->integer('applicant_income');
            $table->bigInteger('coapplicant_id')->unsigned();
            $table->integer('coapplicant_income');
            $table->integer('loan_amount');
            $table->integer('loan_amount_term');
            $table->integer('credit_history');
            $table->string('property_area');
            $table->integer('loan_status')->default(0);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('coapplicant_id')->references('id')->on('users');

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
        Schema::dropIfExists('loan__applications');
    }
}
