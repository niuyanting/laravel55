<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *Ȩ�ޱ�
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fid')->default(0)->comment('����id');
            $table->string('name',50)->comment('Ȩ������');
            $table->string('url',80)->comment('Ȩ�޵�url��ַ');
            $table->enum('is_menu',['1','2'])->default('1')->comment('�Ƿ���ʾ�˵� 1�� 2��');
            $table->integer('sort')->default(100)->comment('Ȩ������');
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
        Schema::dropIfExists('permissions');
    }
}
