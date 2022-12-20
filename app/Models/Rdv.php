<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rdv extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'heure',
        'patient_id',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class);;
    }
}
