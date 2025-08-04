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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_group_id')->nullable()->constrained()->onDelete('set null');
            $table->enum('type', ['multiple_choice', 'true_false', 'fill_blank']);
            $table->text('question_text');
            $table->text('explanation')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('questions');
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['question_group_id']);
            $table->dropColumn('question_group_id');
        });
    }
};
