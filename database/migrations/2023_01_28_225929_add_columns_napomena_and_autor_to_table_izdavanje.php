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
        Schema::table('izdavanjes', function (Blueprint $table) {
            $table->after('naziv_knjige', function($table){
                $table->string('autor_knjige');
                $table->text('napomena');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('izdavanjes', function (Blueprint $table) {
            $table->dropColumn('autor_knjige');
            $table->dropColumn('napomena');
        });
    }
};
