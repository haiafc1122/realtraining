<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id')->comment('管理者ID');
            $table->string('username')->default('0')->comment('管理者のアカウント');
            $table->string('password')->comment('管理者のパスワード');
            $table->string('avatar')->default('0')->comment('管理者のアバター');
            $table->rememberToken()->comment('リメンバートークン');
            $table->timestamps();
            $table->index('id');
        });
        DB::statement("ALTER TABLE `admins` comment '管理者の情報を格納'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
