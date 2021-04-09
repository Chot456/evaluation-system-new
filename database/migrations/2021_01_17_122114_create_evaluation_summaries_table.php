<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluationSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluation_summary', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('evaluator_id')->nullable();
            $table->foreign('evaluator_id')->references('id')->on('users');
            $table->unsignedBigInteger('employee_evaluated_id')->nullable();
            $table->foreign('employee_evaluated_id')->references('id')->on('users');
            $table->unsignedBigInteger('evaluation_id')->nullable();
            $table->foreign('evaluation_id')->references('id')->on('employee_to_evaluate');
            $table->date('date_evaluated')->nullable();
            $table->string('publish')->nullable();
            $table->string('rating')->nullable();
            $table->integer('question1');
            $table->integer('question2');
            $table->integer('question3');
            $table->integer('question4');
            $table->integer('question5');
            $table->integer('question6');
            $table->integer('question7');
            $table->integer('question8');
            $table->integer('question9');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('evaluation_summary');
    }
}
