<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('nametask');
            $table->text('description');
            $table->string('file')->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->enum('status', ['2', '1', '0'])->default('2')->nullable();
            $table->integer('progress')->nullable()->default(0);
            $table->string('userjoin')->nullable();
            $table->string('userCreate')->nullable();
            $table->string('userId')->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
