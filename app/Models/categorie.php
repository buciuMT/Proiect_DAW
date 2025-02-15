<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = [
        'descriere',
    ];
    protected $table = 'categorie';
    protected $primaryKey = 'nume_categorie';
    protected $keyType = 'string';
    protected $auto_increment = false;
}
