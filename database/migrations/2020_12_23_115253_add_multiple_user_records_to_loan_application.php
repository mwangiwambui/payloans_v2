<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleUserRecordsToLoanApplication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('loan__applications', function (Blueprint $table) {
            $table->string('job_title')->nullable()->default(null);
            $table->string('bank_statement')->nullable()->default(null);
            $table->float('default_score')->nullable()->default(0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('loan__applications', function (Blueprint $table) {
            $table->dropColumn('job_title');
            $table->dropColumn('bank_statement');
            //
        });
    }
}
