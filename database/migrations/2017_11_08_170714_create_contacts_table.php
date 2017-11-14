<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id')->comment('問い合わせのID');
            $table->string('name')->default('0')->comment('ビジター ・ユーザーの名前');
            $table->string('email')->default('0')->comment('ビジター ・ユーザーメール');
            $table->string('phone_number',15)->default('0')->comment('ビジター・ユーザーの電話番号');
            $table->string('location')->default('0')->comment('ビジター ・ユーザーの住所');
            $table->text('content')->comment('問い合わせの内容');
            $table->boolean('checked')->default('0')->comment('内容がチェックかどうか');
            $table->timestamp('created_at')->default('0000-00-00 00:00:00')->comment('問い合わせの時間');
        });
        DB::statement("ALTER TABLE `contacts` comment 'ビジター・ユーザーの問い合わせを格納'");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
