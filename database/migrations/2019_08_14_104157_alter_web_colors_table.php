<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterWebColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('web_colors', function (Blueprint $table) {
            $table->string('title', 64)->nullable()->comment('Название цвета');
            $table->string('background', 6)->nullable()->comment('Цвет фона');
            $table->string('color', 6)->nullable()->comment('Цвет текста');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('web_colors', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('background');
            $table->dropColumn('color');
        });
    }
}
