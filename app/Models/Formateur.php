<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formateur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom', 'prenom', 'tel' ,'email', 'photo', 'cv' ,'recto', 'vecto', 'attes' ,'diplome', 'exp', 'demaine' ,'spec' ,'dispo','recrutement_id' 
    ];
}
