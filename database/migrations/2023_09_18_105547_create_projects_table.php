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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->max(500);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('image_url');
            $table->integer('total_story_point');
            $table->integer('done_story_point');
            $table->smallInteger('status'); // 1: Proposal, 2: Ongoing, 3: Done
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
