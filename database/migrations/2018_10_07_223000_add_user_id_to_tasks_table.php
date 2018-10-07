<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();            // カラム追加
            $table->foreign('user_id')->references('id')->on('users');  // 外部キー制約
        });
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign('user_id'); // 外部キー制約の解除
            $table->dropColumn('user_id');  // 追加したカラム削除
        });
    }
}
