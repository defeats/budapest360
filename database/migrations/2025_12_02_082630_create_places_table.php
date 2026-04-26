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
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string("name");
            $table->string('slug')->unique();
            $table->integer('post_code');
            $table->string("address");
            $table->string("phone")->unique();
            $table->string("email")->unique()->nullable();
            $table->string("website")->nullable();
            $table->longText("description");
            $table->boolean("outdoor_seating")->default(false);
            $table->boolean("wifi")->default(false);
            $table->boolean("pet_friendly")->default(false);
            $table->boolean("family_friendly")->default(false);
            $table->boolean("card_payment")->default(false);
            $table->boolean("free_parking")->default(false);
            $table->boolean("free_entry")->default(false);
            $table->boolean("photo_spot")->default(false);
            $table->boolean("accessible")->default(false);
            $table->boolean("student_discount")->default(false);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('approved'); //majd irjuk vissza pendingre
            $table->integer('clicks')->default(0);
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
