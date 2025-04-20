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
            $table->string('FejezetCim', 50);
            $table->string('KepFile', 50)->default(Null);
            $table->string('TilalmiIdoszak', 50)->default(Null);
            $table->Integer('MeretKorlat')->default(Null);
            $table->boolean('DarabKorlatos')->default(Null);
            $table->string('Foghatosag', 50)->default(Null);
            $table->text('SzovegHtml')->default(Null);
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
