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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->unsignedBigInteger('place_id');
            $table->foreign("place_id")->references('id')->on('places')->onDelete("cascade");
            $table->text("comment")->nullable();
            $table->enum("price_range", ['2000 - 4000 Ft', '4000 - 6000 Ft', '6000 - 8000 Ft', '8000 - 10000 Ft', '10000 Ft felett'])->nullable();
            $table->tinyInteger("star")->unsigned();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
