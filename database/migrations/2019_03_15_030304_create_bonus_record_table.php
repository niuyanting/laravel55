<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bs_bonus_record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->comment('�û�id');
            $table->integer('bonus_id')->comment('���id');
            $table->decimal('money',10,2)->comment('�û��������');
            $table->enum('flag',['1','2'])->default('1')->comment('�Ƿ��������:1�� 2 ��');
            $table->timestamps();
            $table->unique(['user_id','bonus_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bs_bonus_record');
    }
}
