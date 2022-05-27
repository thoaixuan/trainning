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
                $table->bigIncrements('id');
                $table->string('mail_driver')->nullable();
                $table->string('mail_host')->nullable();
                $table->string('mail_port')->nullable();
                $table->string('mail_from_address')->nullable();
                $table->string('mail_from_name')->nullable();
                $table->string('mail_encryption')->nullable();
                $table->string('mail_username')->nullable();
                $table->string('mail_password')->nullable();
                $table->string('mail_receive')->nullable();
                $table->string('guest_logo_footer')->nullable();
                $table->string('guest_logo_header')->nullable();
                $table->text('url_map')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
