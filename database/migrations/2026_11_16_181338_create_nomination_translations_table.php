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
        Schema::create('nomination_translations', function (Blueprint $table) {
            $table->char('locale',3);
            $table->string('nomination');
            $table->foreign('nomination')->references('key')->on('nominations')->cascadeOnDelete();
            $table->string('name');
            $table->string('description');

            $table->primary(['nomination', 'locale']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nomination_translations');
    }
};
