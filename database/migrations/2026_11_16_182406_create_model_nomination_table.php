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
        Schema::create('model_nomination', function (Blueprint $table) {
            $table->foreignId('model_id')
                ->constrained('models', 'id')->cascadeOnDelete();
            $table->string('nomination');
            $table->foreign('nomination')
                ->references('key')->on('nominations')->cascadeOnDelete();
            $table->primary(['model_id', 'nomination']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_nomination');
    }
};
