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
        Schema::create('works', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('workid');          // お仕事ID
            $table->string('adminid');         // 依頼者ID
            $table->string('influid');         // インフルエンサーID
            $table->string('sns_kind1');       // instagram
            $table->string('sns_kind2');       // twitter
            $table->string('sns_kind3');       // youtube
            $table->string('sns_kind4');       // その他
            $table->string('pr');              // PR内容
            $table->string('pr_price');        // PR報酬
            $table->string('p_sns_kind1');     // instagram投稿
            $table->string('p_sns_kind2');     // twitter投稿
            $table->string('p_sns_kind3');     // youtube投稿
            $table->string('p_sns_kind4');     // その他
            $table->string('registr_date');    // 登録日
            $table->string('contract_date');   // 受託日
            $table->string('completion_date'); // 完了日
            $table->string('status');          // ステータス
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
        Schema::dropIfExists('works');
    }
}
