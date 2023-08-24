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
        Schema::table('user_details', function (Blueprint $table) {
            $table->integer('height')->nullable()->change();
            $table->integer('weight')->nullable()->change();
            $table->string('sex')->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->text('bio')->nullable()->change();
            $table->string('user_name')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_details', function (Blueprint $table) {
            //
        });
    }
};
