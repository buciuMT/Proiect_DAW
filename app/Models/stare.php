<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stare extends Model
{
    protected $table = 'categorie';
    protected $primary = 'nume_categorie';
    protected $key_type = 'string';
    protected $auto_increment = false;
}
