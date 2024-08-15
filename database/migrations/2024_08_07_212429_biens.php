<?php

use App\Models\Bien;
use App\Models\photo;
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
        Schema::create('biens', function (Blueprint $table) {
            $table->id('id')->primary();
            $table->string('slug');
            $table->boolean('vendu')->default(false);
            $table->string('titre')->unique();
            $table->string('adresse')->unique();
            $table->string('ville');
            $table->string('code_postal');
            $table->integer('surface');
            $table->integer('nb_pieces');
            $table->integer('prix');
            $table->integer('nb_chambres');
            $table->integer('nb_étages');
            $table->boolean('chauffage');
            $table->text('description');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
        Schema::table('photos', function (Blueprint $table) {
            $table->dropforeignIdFor(Bien::class);
        });
    }
};
