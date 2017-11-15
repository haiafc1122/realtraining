<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('メッセージのID');
            $table->string('content')->default('0')->comment('メッセージの内容');
            $table->integer('user_id')->unsigned()->default('0')->comment('差出人ID');
            $table->boolean('is_public')->default('0')->comment('グループのメッセージかプライベートか');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00')->comment('作成日時');
            $table->index('id');
            $table->foreign('user_id')->references('id')->on('users');
        });
        DB::statement("ALTER TABLE `messages` comment 'サイトでメッセージの差出人・内容を格納'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
