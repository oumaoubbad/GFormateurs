<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatStage extends Model
{
    use HasFactory;
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
        'candidatStage_id'

    ];


    public function recrutementStage()
    {
        return $this->belongsTo(RecrutementStage::class);
    }

}
