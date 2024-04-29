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
        Schema::create('floor_has_section', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('floors_id');
            $table->unsignedBigInteger('sections_id');
            $table->timestamps();

            $table->foreign('floors_id')
                ->references('id')->on('floors')
                ->onDelete('cascade');

            $table->foreign('sections_id')
                ->references('id')->on('sections')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floor_has_section');
    }
};
