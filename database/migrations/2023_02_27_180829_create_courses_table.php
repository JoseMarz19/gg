<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Course;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('description');
            $table->enum('status',[Course::BORRADOR,Course::REVISION, Course::PUBLICADO])->default(Course::BORRADOR);
            $table->string('slug');
            // CAMPOS DE LAS LLAVES FORANEAS
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('price_id')->nullable();
            // RESTRINCCIONES DE LLAVES FORANEAS
            //EL PRIMER CAMPO ES PARA LAS COLUMNAS QUE DEFINIMOS PRIMERO
            // LO SEGUNDO ES EL ID
            // EL TERCERO SON LAS TABLAS QUE ESTARAN RELACIONADAS
            // LA OPCION DE ONDELETE('CASCADE') ES PARA EN CASO DE QUE SE ELIMINE EL USUARIO QUE CREO UN CURSO TAMBIEN SE ELIMINEN SUS CURSOS CREADOS
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // LA OPCION DE ONDELETE('SET_NULL') ES PARA EN CASO DE QUE SE ELIMINE EL USUARIO ELIMINE UN NIVEL DE CURSOS ESTOS SE QUEDEN EN NULL
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('price_id')->references('id')->on('prices')->onDelete('set null');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
