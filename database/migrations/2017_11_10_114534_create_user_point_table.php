<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPointTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_point', function (Blueprint $table) {
            $table->increments('id')->comment('ユーザポイントID');
            $table->integer('user_id')->unsigned()->comment('ユーザーID');
            $table->integer('pending_point')->default(0)->comment('判定ポイント数');
            $table->integer('approval_point')->default(0)->comment('承認ポイント数');
            $table->integer('reject_point')->default(0)->comment('却下ポイント数');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00')->comment('作成日時');
            $table->timestamp('update_at')->default('0000-00-00 00:00:00')->comment('更新日時');
            $table->foreign('user_id')->references('id')->on('users');
        });
        DB::statement("ALTER TABLE `user_point` comment 'ユーザーのポイントを格納'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_point');
    }
}
