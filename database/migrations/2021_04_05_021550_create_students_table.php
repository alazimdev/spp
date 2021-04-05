<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('email', 45)->unique();
            $table->string('phone_number', 16);
            $table->string('nisn', 10);
            $table->string('nis', 9);
            $table->string('full_name', 45);
            $table->enum('gender', ['Laki-Laki','Perempuan']);
            $table->date('date_of_birth');
            $table->string('junior_high_school', 50);
            $table->string('month_entered', 2);
            $table->string('year_entered', 4);
            $table->string('month_end', 2);
            $table->string('year_end', 4);
            $table->foreignID('class_id')->references('id')->on('classes')->onDelete('cascade');
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
        Schema::dropIfExists('students');
    }
}
