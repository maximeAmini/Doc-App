<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'email',
        'adress',
        'civilite',
        'tel',
        'date_naiss',
        'lieu_naiss',
        'groupe_sang',
        'taille',
        'poids',
    ];

    public function rdvs(){
        return $this->hasMany(Rdv::class); 
    }
}
