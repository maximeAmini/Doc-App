<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medecin extends Model
{
    use HasFactory;

    protected $fillable = [
        'civilite',
        'specialite',
        'adress',
        'tel',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
