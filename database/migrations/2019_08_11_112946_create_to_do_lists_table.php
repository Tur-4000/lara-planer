<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToDoListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('to_do_list', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title', 128)
                ->comment('Название задачи');
            $table->bigInteger('category_id')
                ->comment('Категория задачи');
            $table->date('due_date')
                ->comment('Крайний срок');
            $table->date('end_date')
                ->nullable()
                ->comment('Дата закрытия задачи');
            $table->boolean('is_ended')
                ->default(false)
                ->comment('Отметка о закрытии задачи');
            $table->text('note')
                ->nullable()
                ->comment('Описание задачи');

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->timestamps();
            $table->softDeletes();

            $table->index('title');
            $table->index('due_date');
            $table->index('end_date');
            $table->index('is_ended');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do_lists');
    }
}
