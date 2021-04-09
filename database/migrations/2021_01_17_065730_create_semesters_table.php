<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semester', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semesterDescription');
            $table->timestamps();
        });

        $semesters = [
            '1st Semester',
            '2nd Semester',
            '3rd Semester',
        ];
        
        $now = new DateTime();

        foreach($semesters as $semester) {
            DB::table('semester')->insert([
                'semesterDescription' => $semester,
                'created_at' => $now,
                'updated_at' => $now
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('semester');
    }
}
