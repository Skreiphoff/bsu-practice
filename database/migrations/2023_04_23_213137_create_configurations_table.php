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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->string('description');
            $table->integer('address');
            $table->boolean('is_enabled');
            $table->foreignId('type_description_id')->constrained('type_descriptions');
            $table->foreignId('device_id')->constrained('devices');
            $table->foreignId('quiz_groups')->constrained('quiz_groups');
            $table->foreignId('access_type_id')->constrained('access_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
