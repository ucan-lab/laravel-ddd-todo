<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->comment('タスク');
            $table->ulid('id')->primary()->comment('タスクID');
            $table->ulid('user_id')->comment('ユーザーID');
            $table->string('name')->comment('タスク名');
            $table->string('status')->comment('ステータス');
            $table->date('due_date')->comment('期日');
            $table->unsignedTinyInteger('post_pone_count')->default(0)->comment('延期回数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
