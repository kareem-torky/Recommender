<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('university');
            $table->string('college');
            $table->string('gender');
            $table->string('speciality');
            $table->unsignedInteger('gpa');	
            $table->unsignedInteger('price');	
            $table->unsignedInteger('rating');	
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleges');
    }
}
