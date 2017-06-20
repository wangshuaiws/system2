<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScaleManageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scale_manage', function (Blueprint $table) {
            $table->increments('id');
            $table->String('title');
			$table->String('name');
            $table->integer('number');
            $table->string('type');
            $table->string('for_which');
            $table->boolean('is_remove')->default(0);
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
        Schema::dropIfExists('scale_manage');
    }
}
