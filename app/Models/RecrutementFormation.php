<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecrutementFormation extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre', 'description', 'competence', 'lieu', 'date_limite' ,'niveau' ,'fonction' ,'Domaine'
    ];
}
