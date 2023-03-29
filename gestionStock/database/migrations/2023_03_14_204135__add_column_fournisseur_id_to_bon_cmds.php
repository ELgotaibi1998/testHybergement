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
        Schema::table('bon_cmds', function (Blueprint $table) {
            $table->unsignedBigInteger("fournisseur_id");
            $table->foreign("fournisseur_id")->references("id")->on("fournisseurs");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bon_cmds', function (Blueprint $table) {
            //
        });
    }
};
