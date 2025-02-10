<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = [
        'descriere',
    ];
    protected $table = 'categorie';
    protected $primary = 'nume_categorie';
    protected $key_type = 'string';
    protected $auto_increment = false;
}
