<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInflusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('influs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tell')->nullable();// 電話番号を保存するカラム
            $table->string('address')->nullable();// 住所を保存するカラム
            $table->string('gender')->nullable();  // 性別を保存するカラム
            $table->string('age')->nullable();// 年齢を保存するカラム
            $table->string('sns_kind')->nullable();// 使用するsnsを保存するカラム
            $table->string('sns_url')->nullable();// snsのurlを保存するカラム
            $table->string('sns_genre')->nullable();//snsのジャンルを保存するカラム            
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
        Schema::dropIfExists('influs');
    }
}
