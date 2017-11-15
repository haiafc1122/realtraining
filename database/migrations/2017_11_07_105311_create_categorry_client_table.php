<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorryClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_client', function (Blueprint $table) {
            $table->integer('category_id')->unsigned()->comment('カテゴリーID');
            $table->integer('client_id')->unsigned()->comment('クライアントID');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00')->comment('作成した日時');
            $table->primary(['category_id', 'client_id']);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->index(['category_id','client_id']);
        });
        DB::statement("ALTER TABLE `category_client` comment 'カテゴリーテープルとクライアントの案件との交差点テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categorry_client');
    }
}
