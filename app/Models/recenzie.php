<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Thiagoprz\EloquentCompositeKey\HasCompositePrimaryKey;

class recenzie extends Model
{
    protected $table = 'recenzie';
    protected $primaryKey = ['cod_client', 'isbn'];
    protected $keyType = 'string';
    //  protected $auto_increment = false;
}
