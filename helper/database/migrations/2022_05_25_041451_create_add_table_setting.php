<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddTableSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('settings', function (Blueprint $table) {
                $table->id();
                // Config mail
                $table->text('config_mail')->nullable();
                // Setting website
                $table->string('website_name')->nullable();
                $table->text('website_logo')->nullable();
                $table->string('root_color')->nullable();
                $table->string('route_login')->nullable();
                $table->string('route_admin')->nullable();

                //Banner
                $table->text('home_banner')->nullable();
                //Project
                $table->text('home_category')->nullable();
                // Question
                $table->text('home_question')->nullable();
                // Info
                $table->text('home_info')->nullable();
                //Config google
                $table->text('config_google')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
