<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('handicrafts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scrap_category_id')->constrained('scrap_categories')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
            $table->string('image');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes($column = 'deleted_at', $precision=0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('handicrafts');
    }
};
