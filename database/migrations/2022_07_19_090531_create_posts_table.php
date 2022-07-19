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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('short_content');
            $table->text('content');
            $table->foreignId('category_id');
            $table->foreignId('user_id');
            $table->unsignedBigInteger('comments_count')->default(0);
            $table->unsignedBigInteger('visit_count')->default(0);
            $table->enum('status',['پیش نویس','منتشر شده'])->default('پیش نویس');
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
        Schema::dropIfExists('posts');
    }
};
