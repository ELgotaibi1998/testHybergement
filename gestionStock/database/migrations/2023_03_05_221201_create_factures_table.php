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
    {Schema::disableForeignKeyConstraints();
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string("signature");
            
            $table->float("qte");
            $table->float("prixT")->nullable();
            $table->float("tva");
            $table->float("prixTTC")->nullable();
           
            $table->unsignedBigInteger("article_id");
            $table->unsignedBigInteger("bonCmd_id")->nullable();
            $table->unsignedBigInteger("marche_id")->nullable();
          
            $table->foreign("article_id")->references("id")->on("articles");
            $table->foreign("bonCmd_id")->references("id")->on("bon_cmds");
            $table->foreign("marche_id")->references("id")->on("marches");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
