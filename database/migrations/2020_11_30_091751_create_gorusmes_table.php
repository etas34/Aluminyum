<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGorusmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gorusmes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('ad_soyad');
            $table->text('mesaj');
            $table->string('tarih');
            $table->string('firma_unvan');
            $table->string('tel');
            $table->string('website');
            $table->string('ulke');
            $table->string('email');
            $table->tinyInteger('durum')->default(0);
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
        Schema::dropIfExists('gorusmes');
    }
}
