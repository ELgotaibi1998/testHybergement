<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('qteSGlobals', function (Blueprint $table) {
            $table->id();
            $table->float('qteGlobal')->nullable();
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
        Schema::dropIfExists('qteSGlobal');
    }
    };
