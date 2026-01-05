<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('places', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string("name");
            $table->string('slug')->unique();
            $table->string("old_name")->nullable();
            $table->integer('post_code');
            $table->string("address");
            $table->string("phone")->nullable()->unique();
            $table->string("email")->nullable()->unique();
            $table->string("website")->nullable()->unique();
            $table->longText("description")->nullable();
            $table->string("longitude")->nullable();
            $table->string("latitude")->nullable();
            $table->string("outdoor_seating")->nullable();
            $table->integer("views");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('places');
    }
};
