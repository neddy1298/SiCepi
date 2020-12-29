<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWritingChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('writing_children', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('writing_id');
            $table->string('writing_name')->nullable();
            $table->longText('writing_text')->nullable();
            $table->timestamps();

            $table->foreign('writing_id')->references('id')->on('writings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('writing_children');
    }
}
