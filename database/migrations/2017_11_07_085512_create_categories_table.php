<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id')->comment('カテゴリーID');
            $table->string('name')->default('0')->comment('カテゴリー名前');
            $table->text('description')->comment('説明');
            $table->timestamps();
            $table->index('id');
        });
        DB::statement("ALTER TABLE `categories` comment 'クライアントの案件のタイプを格納'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
