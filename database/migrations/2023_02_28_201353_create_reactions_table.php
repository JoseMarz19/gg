<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Reaction;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reactions', function (Blueprint $table) {
            $table->id();

            //
            $table->enum('value', [Reaction::LIKE , Reaction::DISLIKE]);
            //LLAVE FORANEA
            $table->unsignedBigInteger('user_id');
            //POLIMORFISMO
            $table->unsignedBigInteger('reactionable_id');
            $table->string('reactionable_type');
            //RESTRICCION DE LLAVE
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reactions');
    }
};
