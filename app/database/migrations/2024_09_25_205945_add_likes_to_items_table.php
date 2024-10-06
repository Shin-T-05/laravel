<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLikesToItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('likes')->default(0);  // likesカラムを追加し、デフォルトは0に設定
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()

    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropColumn('likes');  // likesカラムを削除
        });
    }
}
