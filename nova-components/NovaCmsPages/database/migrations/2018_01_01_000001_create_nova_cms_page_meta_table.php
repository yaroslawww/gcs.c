<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovaCmsPageMetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_meta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('entity_id')->index();
            $table->foreign('entity_id')
                ->references('id')->on('pages')
                ->onDelete('cascade');
            $table->string('group', 255)->default('default');
            $table->string('key', 255);
            $table->text('value')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('page_meta');
    }
}
