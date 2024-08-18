<?php

use App\Models\Bien;
use App\Models\specificite;
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
        Schema::create('bien_specificite', function (Blueprint $table) {
            $table -> foreignIdFor(Bien::class)->constrained()->cascadeOnDelete();
            $table -> foreignIdFor(specificite::class)->constrained()->cascadeOnDelete();
            $table -> primary(['bien_id', 'specificite_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens_specificites');
    }
};
