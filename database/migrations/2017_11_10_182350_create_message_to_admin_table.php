<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageToAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_to_admin', function (Blueprint $table) {
            $table->integer('admin_id')->unsigned()->comment('受信者ID');
            $table->bigIncrements('message_id')->unsigned()->comment('メッセージID');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00')->comment('受信時間');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('message_id')->references('id')->on('messages');
            $table->index(['message_id', 'admin_id']);
        });
        DB::statement("ALTER TABLE `message_to_admin` comment 'グループでない場合はメッセージの受信者を格納'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_to_admin');
    }
}
