<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bs_bonus', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total_amount',10,2)->comment('����ܶ�');
            $table->decimal('left_amount',10,2)->comment('���ʣ���ܶ�');
            $table->integer('total_nums')->default(0)->comment('����ܸ���');
            $table->integer('left_nums')->default(0)->comment('���ʣ�����');
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
        Schema::dropIfExists('bonus');
    }
}
