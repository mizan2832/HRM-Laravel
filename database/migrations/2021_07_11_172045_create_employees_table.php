<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('email');
            $table->string('gender');
            $table->date('birth_date');
            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('local_address');
            $table->string('permanent_address');
            $table->string('nationality');
            $table->string('reference1');
            $table->string('reference1_phone');
            $table->string('reference2')->nullable();
            $table->string('reference2_phone')->nullable();
            $table->string('zip_code');
            $table->string('meritial_status');
            $table->string('profile_picture');
            $table->string('resume');
            $table->string('offer');
            $table->string('joining_letter');
            $table->string('other')->nullable();
            $table->string('employee_id');
            $table->string('department');
            $table->date('joining_date');
            $table->string('status');
            $table->integer('basic');
            $table->integer('medical_allowance');
            $table->integer('transport');
            $table->integer('house_rent');
            $table->integer('tax')->nullable();
            $table->integer('absent')->nullable();
            $table->integer('meal')->nullable();
            $table->integer('total_salary');
            $table->string('holder_name');
            $table->string('account_number');
            $table->string('bank_name');
            $table->string('branch_name');
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
        Schema::dropIfExists('employees');
    }
}
