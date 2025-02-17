<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produs extends Model
{
    use HasFactory;

    protected $table = 'produs';
    protected $primaryKey = 'ID_PRODUS';
    public $timestamps = false;

    protected $fillable = ['DENUMIRE', 'COD_CATEGORIE', 'COD_PRODUCATOR', 'USER_RATING'];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'COD_CATEGORIE');
    }

    public function producator()
    {
        return $this->belongsTo(Producator::class, 'COD_PRODUCATOR');
    }

    public function stocuri()
    {
        return $this->hasMany(Stoc::class, 'COD_PRODUS');
    }
}
