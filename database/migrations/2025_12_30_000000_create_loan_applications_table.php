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
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->string('mobile')->nullable();
            $table->boolean('agreed')->default(false);

            // personal
            $table->string('full_name')->nullable();
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('pan')->nullable();
            $table->date('dob')->nullable();
            $table->string('pincode')->nullable();
            $table->string('income')->nullable();
            $table->string('occupation')->nullable();

            // professional
            $table->string('company_type')->nullable();
            $table->string('loan_purpose')->nullable();
            $table->string('ownership')->nullable();

            // documents
            $table->string('statement_path')->nullable();

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
        Schema::dropIfExists('loan_applications');
    }
}
