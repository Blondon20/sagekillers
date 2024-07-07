<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('id');
            $table->string('nom_complet');
            $table->string('email');
            $table->string('num_cni');
            $table->string('adresse');
            $table->string('date_naissance');
            $table->string('photo')->nullable();
            $table->string('telephone1');
            $table->string('telephone2')->nullable();
            $table->string('salaire');
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
        Schema::dropIfExists('employees');
    }
}
