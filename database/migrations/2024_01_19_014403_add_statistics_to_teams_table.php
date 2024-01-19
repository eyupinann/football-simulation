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
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('group_id');
            $table->integer('win')->default(0);
            $table->integer('draw')->default(0);
            $table->integer('loss')->default(0);
            $table->string('goal_difference')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->integer('group_id')->nullable();
            $table->drop()->column('win');
            $table->drop()->column('draw');
            $table->drop()->column('loss');
            $table->drop()->column('goal_difference');
        });
    }
};
