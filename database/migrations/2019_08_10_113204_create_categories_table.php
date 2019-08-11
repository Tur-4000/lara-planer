<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name', 32)
                ->unique()
                ->comment('Название категории');
            $table->string('slug', 32)
                ->unique()
                ->comment('Slug категории');
            $table->text('description')
                ->nullable()
                ->comment('Описание категории');
            $table->bigInteger('web_color_id')
                ->comment('Цветовое выделение категории');

            $table->foreign('web_color_id')
                ->references('id')
                ->on('web_colors');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
