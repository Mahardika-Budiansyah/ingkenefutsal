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
        Schema::table('fields', function (Blueprint $table) {
            $table->unsignedBigInteger('fieldtype_id')->after('name')->required();

            $table->foreign('fieldtype_id')->references('id')->on('fieldtypes')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fields', function (Blueprint $table) {
            $table->dropForeign(['fieldtype_id']);
            $table->dropColumn('fieldtype_id');
        });
    }
};
