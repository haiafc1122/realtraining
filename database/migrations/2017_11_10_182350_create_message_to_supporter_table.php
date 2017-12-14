<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageToSupporterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_to_supporter', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->comment('受信者ID');
            $table->bigIncrements('message_id')->unsigned()->comment('メッセージID');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('受信時間');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('message_id')->references('id')->on('messages');
            $table->index(['message_id', 'user_id']);
        });
        DB::statement("ALTER TABLE `message_to_supporter` comment 'グループでない場合はメッセージの受信者を格納'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_to_supporter');
    }
}
