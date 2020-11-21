<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
        public function up()
{
 if(!Schema::hasTable('works')) { //worksテーブルがなかったら   
 Schema::create('works', function (Blueprint $table) {
  $table->bigIncrements('id'); // お仕事ID
  $table->bigInteger('adminid'); // 依頼者ID
  $table->bigInteger('influid'); // インフルエンサーID
  $table->boolean('sns_kind1'); // instagram true:有効 false:無効
  $table->boolean('sns_kind2'); // twitter true:有効 false:無効
  $table->boolean('sns_kind3'); // youtube true:有効 false:無効
  $table->boolean('sns_kind4'); // その他　true:有効 false:無効
  $table->string('pr'); // PR内容
  $table->integer('pr_price'); // PR報酬
  $table->string('p_sns_kind1'); // instagram投稿
  $table->string('p_sns_kind2'); // twitter投稿
  $table->string('p_sns_kind3'); // youtube投稿
  $table->string('p_sns_kind4'); // その他
  $table->dateTime('registr_date'); // 登録日
  $table->dateTime('contract_date'); // 受託日
  $table->dateTime('completion_date'); // 完了日
  $table->integer('status'); // ステータス 
  $table->timestamps();
  });
 }
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('works');
    }
}
