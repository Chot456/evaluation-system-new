<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolYearsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('school_year', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('yearDescription');
            $table->timestamps();
        });

        $years = [
            '2021',
            '2022',
            '2023',
            '2024',
            '2025'
        ];
        
        $now = new DateTime();

        foreach($years as $year) {
            DB::table('school_year')->insert([
                'yearDescription' => $year,
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
        Schema::dropIfExists('school_year');
    }
}
