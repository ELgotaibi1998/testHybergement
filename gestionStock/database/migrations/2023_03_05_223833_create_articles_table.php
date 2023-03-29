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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string("designation");
            $table->float("qteStock");
            $table->float("Stockmin");
            $table->float("pu");
            $table->dateTime("dateInscription");
            $table->text("observation")->nullable();
            $table->string("reference");
            $table->unsignedBigInteger('categorie_id');
            $table->unsignedBigInteger('emplacement_id');
            $table->unsignedBigInteger('unite_id');
            $table->foreign("categorie_id")->references("id")->on("categories");
            $table->foreign("emplacement_id")->references("id")->on("emplacements");
            $table->foreign("unite_id")->references("id")->on("unites");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
