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
        // criando tabela filiais
        Schema::create('filiais', function (Blueprint $table) {
            $table->id();
            $table->string('filial', 30);
            $table->timestamps();
        });

        // criando tabela produtos_filiais
        Schema::create('produto_filiais', function (Blueprint $table) {
            $table->id();  
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->decimal('price', 10, 2);
            $table->integer(('min_stock'));
            $table->integer(('max_stock'));
            $table->timestamps();


            //foreign keys (constraints)
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        //removendo colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn(['price','min_stock','max_stock']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Adicionar colunas da tabela produtos
        Schema::table('produtos', function (Blueprint $table) {
            $table->decimal('price', 10, 2);
            $table->integer(('min_stock'));
            $table->integer(('max_stock'));
        });


        // removendo tabela produtos_filiais
        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
};
