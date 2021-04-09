<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionaire', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('question');
            $table->timestamps();
        });

        $questions = [
            'Clarity',
            'Passion',
            'Interaction',
            'Organization',
            'Speech',
            'Pacing',
            'Disclosure',
            'Report',
            'Class Management',
        ];
        
        $now = new DateTime();

        foreach($questions as $question) {
            DB::table('questionaire')->insert([
                'question' => $question,
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
        Schema::dropIfExists('questionaire');
    }
}
