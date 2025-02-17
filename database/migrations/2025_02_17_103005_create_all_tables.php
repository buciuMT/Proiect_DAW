
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllTables extends Migration
{
    public function up()
    {
        // Create CATEGORIE Table
        Schema::create('categorie_', function (Blueprint $table) {
            $table->id('ID_CATEGORIE'); // AUTO_INCREMENT by default
            $table->string('DENUMIRE');
            $table->primary('ID_CATEGORIE');
        });

        // Create MAGAZIN Table
        Schema::create('magazin', function (Blueprint $table) {
            $table->id('ID_MAGAZIN'); // AUTO_INCREMENT by default
            $table->string('DENUMIRE');
            $table->string('ORAS');
            $table->primary('ID_MAGAZIN');
        });

        // Create PRODUCATOR Table
        Schema::create('producator', function (Blueprint $table) {
            $table->id('ID_PRODUCATOR'); // AUTO_INCREMENT by default
            $table->string('NUME');
            $table->string('SERVICE');
            $table->primary('ID_PRODUCATOR');
        });

        // Create PRODUS Table
        Schema::create('produs', function (Blueprint $table) {
            $table->id('ID_PRODUS'); // AUTO_INCREMENT by default
            $table->string('DENUMIRE');
            $table->unsignedBigInteger('COD_CATEGORIE');
            $table->unsignedBigInteger('COD_PRODUCATOR');
            $table->float('USER_RATING', 8, 2)->nullable(); // Assuming the rating can be nullable
            $table->foreign('COD_CATEGORIE')->references('ID_CATEGORIE')->on('categorie_')->onDelete('cascade');
            $table->foreign('COD_PRODUCATOR')->references('ID_PRODUCATOR')->on('producator')->onDelete('cascade');
            $table->primary('ID_PRODUS');
        });

        // Create STOC Table
        Schema::create('stoc', function (Blueprint $table) {
            $table->unsignedBigInteger('COD_PRODUS');
            $table->unsignedBigInteger('COD_MAGAZIN');
            $table->decimal('PRET', 10, 2);
            $table->integer('CANTITATE');
            $table->primary(['COD_PRODUS', 'COD_MAGAZIN']);
            $table->foreign('COD_PRODUS')->references('ID_PRODUS')->on('produs')->onDelete('cascade');
            $table->foreign('COD_MAGAZIN')->references('ID_MAGAZIN')->on('magazin')->onDelete('cascade');
        });

        Schema::create('otpuser', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->foreignId('user_id')->nullable();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('otu')->default(false);
        });
    }

    public function down()
    {
        Schema::dropIfExists('stoc');
        Schema::dropIfExists('produs');
        Schema::dropIfExists('producator');
        Schema::dropIfExists('magazin');
        Schema::dropIfExists('categorie_');
    }
};
