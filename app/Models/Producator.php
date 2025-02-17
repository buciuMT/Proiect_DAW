<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Producator extends Model
{
    use HasFactory;

    protected $table = 'producator';
    protected $primaryKey = 'ID_PRODUCATOR';
    public $timestamps = false;

    protected $fillable = ['NUME', 'SERVICE'];

    public function produse()
    {
        return $this->hasMany(Produs::class, 'COD_PRODUCATOR');
    }
}
