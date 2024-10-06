<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //public function up()
    //{
        //Schema::create('goods', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->integer('user_id');
            //$table->integer('item_id');
            //$table->timestamps();
        //});
    //}

    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ユーザーID
            $table->foreignId('post_id')->constrained()->onDelete('cascade'); // 投稿ID
            $table->timestamps();

            $table->unique(['user_id', 'post_id']); // ユーザーと投稿の組み合わせはユニーク
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}
