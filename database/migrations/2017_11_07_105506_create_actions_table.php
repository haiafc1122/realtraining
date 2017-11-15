<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->comment('ユーザID');
            $table->integer('client_id')->unsigned()->comment('クライアントID');
            $table->integer('point')->default(0)->comment('ユーザーがもらったポイント数');
            $table->enum('state', ['started', 'approval', 'reject'])->default('started')->comment('アクションの状態(発生, 承認, 却下)を保持');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00')->comment('アクションの登録日時');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->index(['user_id', 'client_id']);
        });
        DB::statement("ALTER TABLE `actions` comment 'ユーザーテープルとクライアントの案件テープルとの交差点テーブル'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actions');
    }
}
