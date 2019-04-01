<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminUsersTable extends Migration
{
    /**
     * Run the migrations.
     *��̨�����û���
     * @return void
     */
    public function up()
    {
        Schema::create('admin_users', function (Blueprint $table) {
            $table->increments('id')->comment('����id');
            $table->string('username',50)->default('')->comment('�û���');
            $table->string('password',32)->default('')->comment('����');
            $table->string('image_url',150)->default('')->comment('�û�ͷ��');
            $table->enum('is_super',['1','2'])->default('1')->comment('�Ƿ񳬹�1�ǳ��� 2����');
            $table->enum('status',['1','2'])->default('1')->comment('�û�״̬1���� 2ͣ��');
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
        Schema::dropIfExists('admin_users');
    }
}
