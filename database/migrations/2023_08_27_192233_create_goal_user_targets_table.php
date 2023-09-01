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
        Schema::create('goal_user_targets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('goal_id');
            $table->foreignId('goal_user_id');
            $table->foreignId('user_id');
            $table->string('recruit_name');
            $table->string('last_update');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('goal_user_targets');
    }
};
