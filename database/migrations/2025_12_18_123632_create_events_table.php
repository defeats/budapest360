<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string("name");
            $table->integer('post_code');
            $table->string("address");
            $table->string("phone")->nullable()->unique();
            $table->string("email")->nullable()->unique();
            $table->longText("description");
            $table->dateTime('starts_at');
            $table->dateTime('ends_at');
            $table->string("longitude")->nullable();
            $table->string("lattitude")->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
