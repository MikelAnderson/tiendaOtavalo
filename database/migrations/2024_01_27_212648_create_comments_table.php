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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->text('content');
            $table->boolean('posted');
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate()
                ->onDelete('cascade');
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->onDelete('cascade');
            $table->foreignId('parent_id')
                ->nullable()
                ->references('id')
                ->on('comments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('comments');
    }
};
