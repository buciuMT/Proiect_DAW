<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Thiagoprz\EloquentCompositeKey\HasCompositePrimaryKey;

class recenzie extends Model
{
    use HasCompositePrimaryKey;
    protected $table = 'recenzie';
    protected $primaryKey = ['cod_client', 'isbn'];
    protected $key_type = 'string';
    protected $auto_increment = false;
}
