<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('floor_sections', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('object_id')->unsigned();
            $table->bigInteger('floor_id')->unsigned();
            $table->string('surface');
            $table->timestamps();
            $table->foreign('object_id')->references('id')->on('floor_sections')->onDelete('cascade');
            $table->foreign('floor_id')->references('id')->on('floor_sections')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floor_sections');
    }
};
