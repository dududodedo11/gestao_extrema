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
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('name');
            $table->string('nome', 40);
            $table->string('sobrenome', 40)->nullable();
            $table->string('nome_empresa', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('nome');
            $table->dropColumn('sobrenome');
            $table->dropColumn('nome_empresa');
            $table->string('name');
        });
    }
};
