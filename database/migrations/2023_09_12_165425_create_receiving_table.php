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
        Schema::create('receiving', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employer_id')->unsigned()->index();
            $table->bigInteger('overall_id')->unsigned()->index();
        });
        Schema::table('receiving', function($table) {
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('overall_id')->references('id')->on('overalls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('receiving', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });

        Schema::dropIfExists('receiving');
    }
};
