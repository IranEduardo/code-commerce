<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompleteAndressAndOtherInformationsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('cep',8);
            $table->string('endereco');
            $table->integer('numero_endereco')->unsigned();
            $table->string('bairro',30);
            $table->string('complemento',50);
            $table->string('uf',2);
            $table->string('cidade',40);
            $table->string('pais',30);
            $table->string('cpf',11);
            $table->date('data_nascimento');

                       //
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->removeColumn('cep');
            $table->removeColumn('endereco');
            $table->removeColumn('numero');
            $table->removeColumn('bairro');
            $table->removeColumn('complemento');
            $table->removeColumn('uf');
            $table->removeColumn('cidade');
            $table->removeColumn('pais');
            $table->removeColumn('cpf');
            $table->removeColumn('data_nascimento');

        });
    }
}
