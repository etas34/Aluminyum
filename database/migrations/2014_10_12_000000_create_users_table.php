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
            $table->string('ustkategori_id')->nullable();
            $table->string('altkategori_id')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('yetkili')->nullable();
            $table->text('adres')->nullable();
            $table->text('hakkimizda')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('logo')->nullable();
            $table->text('anahtar_kelime')->nullable();
            $table->text('fuar')->nullable();
            $table->tinyInteger('durum')->default('0');
            $table->string('header')->nullable();
            $table->string('ihracat')->nullable();
            $table->string('ihracat_tel')->nullable();
            $table->string('website')->nullable();
            $table->string('ulke')->nullable();
            $table->string('tax_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
