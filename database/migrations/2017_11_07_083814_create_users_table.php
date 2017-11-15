<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->comment('ユーザID');
            $table->string('name',50)->default('0')->comment('ユーザの名前');
            $table->string('email',50)->default('0')->unique()->comment('ユーザメール');
            $table->date('birthday')->default('0')->comment('ユーザの生年月日');
            $table->enum('gender', ['Male', 'Female'])->comment('ユーザのジェンダー');
            $table->string('phone_number',15)->default('0')->unique()->comment('ユーザーの電話番号');
            $table->string('location')->default('0')->comment('ユーザーの住所');
            $table->boolean('is_active')->default('1')->comment('ユーザーが自分のアカウントを削除なら値はFALSEになる');
            $table->string('password')->comment('パスワードのエンコード');
            $table->rememberToken()->unique()->default('0')->comment('リメンバートークン');
            $table->timestamps();
            $table->index(['email', 'password']);
        });
        DB::statement("ALTER TABLE `users` comment 'ユーザーの情報を格納'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
