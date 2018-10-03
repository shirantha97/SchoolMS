<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        public function up()
        {
            Schema::create('student', function (Blueprint $table) {
                $table->increments('id');
                $table->string('studentName');
                $table->string('guardianName');
                $table->string('permanetAddress');
                $table->string('currentAddress');
                $table->string('Gender');
                $table->string('Province');
                $table->string('Grade');
                $table->string('BirthDay');
                $table->string('mobileNumber');
                $table->string('email');
                $table->string('password');
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
            Schema::dropIfExists('student');
        }
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
// public function down()
   //// {
      //  Schema::dropIfExists('student');
   // }
//}
