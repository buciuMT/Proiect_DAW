<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Optuser extends Model
{
    use HasFactory;

    protected $table = 'otpuser';
    public $timestamps = true;

    protected $fillable = ['email'];
}
