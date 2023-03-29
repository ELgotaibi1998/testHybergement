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
        Schema::create('movements', function (Blueprint $table) {
            $table->id();
            $table->float('qteGlobal')->nullable();
            $table->float('QEntrer')->nullable();
            $table->float('qteSortie')->nullable();
            $table->timestamp('dateEntrer')->nullable();
            $table->timestamp('dateSortie')->nullable();
            $table->unsignedBigInteger("article_id");
            $table->foreign("article_id")->references("id")->on("articles");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movements');
    }
};
