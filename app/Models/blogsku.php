<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogsku extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'picture',
        'sinopsis',
        'body',
        'categorie',
    ];
    protected $table = 'blogskus';
}
