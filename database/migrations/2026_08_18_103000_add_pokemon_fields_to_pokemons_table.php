<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pokemons', function (Blueprint $table) {
            $table->unsignedInteger('pokeapi_id')->nullable()->unique()->after('id');
            $table->string('name')->nullable()->unique()->after('pokeapi_id');
            $table->string('sprite_url')->nullable()->after('name');
            $table->boolean('is_starter')->default(true)->after('sprite_url');
        });
    }

    public function down(): void
    {
        Schema::table('pokemons', function (Blueprint $table) {
            $table->dropUnique(['pokeapi_id']);
            $table->dropUnique(['name']);
            $table->dropColumn(['pokeapi_id', 'name', 'sprite_url', 'is_starter']);
        });
    }
};
