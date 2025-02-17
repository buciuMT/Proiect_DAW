<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Categoriex extends Model
{
    use HasFactory;

    protected $table = 'categorie_';
    protected $primaryKey = 'ID_CATEGORIE';
    public $timestamps = false;

    protected $fillable = ['DENUMIRE'];

    public function produse()
    {
        return $this->hasMany(Produs::class, 'COD_CATEGORIE');
    }
}
