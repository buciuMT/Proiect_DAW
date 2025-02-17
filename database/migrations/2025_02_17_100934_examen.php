<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        /*        DB::raw('
CREATE TABLE CATEGORIE (
    ID_CATEGORIE INT PRIMARY KEY,
    DENUMIRE VARCHAR(255) NOT NULL
);

CREATE TABLE MAGAZIN (
    ID_MAGAZIN INT PRIMARY KEY,
    DENUMIRE VARCHAR(255) NOT NULL,
    ORAS VARCHAR(255) NOT NULL
);

CREATE TABLE PRODUCATOR (
    ID_PRODUCATOR INT PRIMARY KEY,
    NUME VARCHAR(255) NOT NULL,
    SERVICE VARCHAR(255) NOT NULL
);

CREATE TABLE PRODUS (
    ID_PRODUS INT PRIMARY KEY,
    DENUMIRE VARCHAR(255) NOT NULL,
    COD_CATEGORIE INT,
    COD_PRODUCATOR INT,
    USER_RATING FLOAT,
    FOREIGN KEY (COD_CATEGORIE) REFERENCES CATEGORIE(ID_CATEGORIE),
    FOREIGN KEY (COD_PRODUCATOR) REFERENCES PRODUCATOR(ID_PRODUCATOR)
);

CREATE TABLE STOC (
    COD_PRODUS INT,
    COD_MAGAZIN INT,
    PRET DECIMAL(10, 2),
    CANTITATE INT,
    PRIMARY KEY (COD_PRODUS, COD_MAGAZIN),
    FOREIGN KEY (COD_PRODUS) REFERENCES PRODUS(ID_PRODUS),
    FOREIGN KEY (COD_MAGAZIN) REFERENCES MAGAZIN(ID_MAGAZIN)
);

            CREATE TABLE UTILIZATOR(
            EMAIL VARCHAR(255) PRIMARY KEY,
            user_id INT,
            FOREIGN KEY (user_id) REFERENCES USER(user_id)
           );

');*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CATEGORIE');
        Schema::dropIfExists('MAGAZIN');
        Schema::dropIfExists('PRODUCATOR');
        Schema::dropIfExists('PRODUS');
        Schema::dropIfExists('STOC');
    }
};
