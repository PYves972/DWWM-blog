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
        Schema::table('users', function (Blueprint $table) {
            // Suppression de l'ancienne colonne 'name'
            $table->dropColumn('name');

            // Ajout des nouvelles colonnes
            $table->string('firstname', 50)->after('id');
            $table->string('lastname', 50)->after('firstname');
            $table->string('role', 50)->default('user')->after('password') ->default('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Annulation des modifications (si vous faites un rollback)
            $table->string('name')->after('id');
            $table->dropColumn(['firstname', 'lastname', 'role']);
        });
    }
};
