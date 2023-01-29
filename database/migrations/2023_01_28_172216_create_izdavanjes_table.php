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
        Schema::create('izdavanjes', function (Blueprint $table) {
            $table->id('izdavanje_id');
            $table->string('naziv_knjige');
            $table->date('datum_izdavanja');
            $table->date('datum_vracanja')->nullable();
            $table->foreignId('knjiga_id')->default(0);
            $table->foreignId('student_id')->default(0);
            $table->foreignId('user_id')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('izdavanjes');
    }
};
