<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Magazin extends Model
{
    use HasFactory;

    protected $table = 'magazin';
    protected $primaryKey = 'ID_MAGAZIN';
    public $timestamps = false;

    protected $fillable = ['DENUMIRE', 'ORAS'];

    public function stocuri()
    {
        return $this->hasMany(Stoc::class, 'COD_MAGAZIN');
    }
}
