<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('date_of_birth')->nullable();
            $table->integer('gender')->nullable()->default(0);
            $table->date('date_start')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('img_before')->nullable();
            $table->string('img_after')->nullable();
            $table->string('description')->nullable();
            $table->integer('status')->nullable()->default(0);
            $table->bigInteger('id_permissions')->nullable();
            $table->bigInteger('id_phongban')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
