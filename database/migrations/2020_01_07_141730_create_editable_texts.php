<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEditableTexts extends Migration
{
    private $tableNames;

    public function __construct()
    {
        $this->tableNames = config('laravel-edit-mode.table_names');
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create($this->tableNames['editable_texts'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('text_id')->unique();
            $table->longText('content')->nullable();
            $table->string('color')->nullable();
            $table->string('font_size')->nullable();
            $table->integer('font_weight')->nullable();
            $table->json('font_family')->nullable();
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
        Schema::dropIfExists($this->tableNames['editable_texts']);
    }
}
