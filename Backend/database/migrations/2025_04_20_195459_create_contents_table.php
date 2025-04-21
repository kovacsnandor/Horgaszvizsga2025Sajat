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
        Schema::create('contents', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement();
            $table->string('FejezetCim', 250);
            $table->string('KepFile', 50)->default(Null)->nullable();
            $table->string('TilalmiIdoszak', 50)->default(Null)->nullable();
            $table->Integer('MeretKorlat')->default(Null)->nullable();
            $table->boolean('DarabKorlatos')->default(Null)->nullable();
            $table->Integer('FoghatosagId')->default(Null)->nullable();
            $table->text('SzovegHtml')->default(Null)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
