<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class istoric_imprumut extends Model
{
    protected $table = 'istoric_imprumut';
    protected $primaryKey = ['cod_client', 'data_primire', 'cod_carte'];
    protected $fillable = ['cod_client', 'data_primire', 'cod_carte', 'cod_stare_primita'];
    protected $auto_increment = false;
}
