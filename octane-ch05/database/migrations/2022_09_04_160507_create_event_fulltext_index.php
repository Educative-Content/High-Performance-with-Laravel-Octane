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
        Schema::table('events', function (Blueprint $table) {
            $table->dropIndex('event_description_index');
            $table->fullText('description', 'event_description_fulltext_index');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            try {
                $table->dropIndex('event_description_fulltext_index');
            } catch (Illuminate\Database\QueryException $e) {
            }
        });

    }
};
