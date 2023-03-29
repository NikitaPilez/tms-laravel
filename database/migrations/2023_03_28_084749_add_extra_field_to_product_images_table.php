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
        Schema::table('product_images', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('is_active');
            $table->string('name')->after('product_id');
            $table->string('type')->after('name');
            $table->string('mimetype')->after('type');
            $table->float('size')->after('mimetype');
            $table->string('path')->after('size');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_images', function (Blueprint $table) {
            $table->string('images');
            $table->boolean('is_active');
            $table->dropColumn('name');
            $table->dropColumn('type');
            $table->dropColumn('mimetype');
            $table->dropColumn('size');
            $table->dropColumn('path');
        });
    }
};
