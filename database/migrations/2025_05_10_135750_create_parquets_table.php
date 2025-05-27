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
        // First create the supplies table
        Schema::create('supplies', function (Blueprint $table) {
            $table->id();
            $table->decimal('kolicinam2',8,3);
            $table->decimal('komad');
            $table->timestamps();
        });

        // Then create the parquets table that references supplies
        Schema::create('parquets', function (Blueprint $table) {
            $table->id();
            $table->foreignId("supply_id")->constrained('supplies');
            $table->string("naziv", 50);
            $table->string("image")->default("default.jpeg");
            $table->string("vrsta_drveta", 30);
            $table->string("boja", 50);
            $table->string("izgled_daske", 50);
            $table->text("opis");
            $table->decimal("cena");
            $table->timestamps();
        });

        
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('parquet_id')->constrained('parquets');
            $table->decimal('total_m2', 10, 3);
            $table->decimal('price', 10, 2);
            $table->boolean('is_ordered')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order
        Schema::dropIfExists('carts');
        Schema::dropIfExists('parquets');
        Schema::dropIfExists('supplies');
    }
};
