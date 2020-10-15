<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email')->unique();// メールアドレスを保存するカラム
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tell'); //会社の電話番号を保存するカラム
            $table->string('name'); //担当者名を保存するカラム
            $table->string('address'); //会社のurlを保存するカラム
            $table->string('name_company'); //会社の名前を保存するカラム
            $table->string('url_company'); //会社のurlを保存するカラム
            $table->string('url_pr'); //PR商品やサービスのurlを保存するカラム
            $table->string('body'); //PR商品やサービスの説明を保存するカラム
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
        Schema::dropIfExists('admins');
    }
}
