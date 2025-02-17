<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stoc extends Model
{
    use HasFactory;

    protected $table = 'stoc';
    public $timestamps = false;

    protected $fillable = ['COD_PRODUS', 'COD_MAGAZIN', 'PRET', 'CANTITATE'];

    public function produs()
    {
        return $this->belongsTo(Produs::class, 'COD_PRODUS');
    }

    public function magazin()
    {
        return $this->belongsTo(Magazin::class, 'COD_MAGAZIN');
    }
}
