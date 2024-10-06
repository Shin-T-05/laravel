<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAmountToHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('histories', function (Blueprint $table) {
        $table->integer('amount')->after('item_id'); // amountを追加
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('histories', function (Blueprint $table) {
        $table->dropColumn('amount'); // ロールバック用にカラムを削除
    });
}
}
