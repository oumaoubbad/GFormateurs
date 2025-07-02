<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    const STATUT_EN_ATTENTE = 0;
    const STATUT_ACCEPTE = 1;
    const STATUT_REFUSE = 2;
    protected $fillable = [
        'nom',
        'prenom',
        'recrutement_id',
        'date_naissance',
        'email',
        'tel',
        'niveauEtude',
        'diplome',
        'descriptionExperience',
        'cv',
        'statut',
        'candidat_id'

    ];


    public function recrutement()
    {
        return $this->belongsTo(Recrutement::class);
    }
}
