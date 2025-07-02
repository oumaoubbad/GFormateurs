<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recrutement extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'description', 'competence', 'lieu', 'date_limite'
    ];

    public function candidats()
    {
        return $this->hasMany(Candidat::class);
    }

}
