<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('posts')) {
            Schema::table('posts', function (Blueprint $table) {
                // Drop foreign key if exists
                try {
                    $table->dropForeign(['user_id']);
                } catch (\Exception $e) {
                    // ignore if it doesn't exist
                }

                if (Schema::hasColumn('posts', 'user_id')) {
                    $table->dropColumn('user_id');
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('posts')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            });
        }
    }
};
