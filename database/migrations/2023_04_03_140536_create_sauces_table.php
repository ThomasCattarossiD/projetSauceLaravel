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
        Schema::create('sauces', function (Blueprint $table) {
            $table->Integer("idSauce")->primary();
            $table->String("userId")->nullable();
            $table->String("name");
            $table->String("manufacturer");
            $table->String("description");
            $table->String("mainPepper");
            $table->String("imageUrl");
            $table->Integer("heat");
            $table->Integer("likes");
            $table->Integer("dislikes");
            $table->String("userLiked");
            $table->String("userDisliked");
            
            $table->foreign("userId")
            ->references("idUtilisateur")
            ->on("utilisateurs")
            ->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sauces');
    }
};
