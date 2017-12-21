<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id')->comment('クライアントの案件のID');
            $table->integer('category_id')->unsigned()->default_('0')->comment('カテゴリーID');
            $table->boolean('is_active')->default('1')->comment('クライアントを削除なら値はFALSEになる');
            $table->string('title')->default_('0')->comment('クライアントの案件のタイトル');
            $table->dateTime('started_date')->comment('クライアントの案件の開始');
            $table->dateTime('end_date')->comment('クライアントの案件の締め切りの日');
            $table->string('url')->default_('0')->unique()->comment('クライアントの案件の提供するリンク');
            $table->string('banner')->default_('0')->comment('クライアントの案件の写真');
            $table->integer('point_num')->default_('0')->comment('クライアントの案件の提供するポイント数');
            $table->tinyInteger('rate')->default_('0')->comment('ユーザーに出すポイントの割合');
            $table->text('description')->comment('クライアントの案件の説明');
            $table->timestamps();
            $table->index('id');
            $table->foreign('category_id')->references('id')->on('categories');
        });
        DB::statement("ALTER TABLE `clients` comment 'クライアントの案件を格納'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
