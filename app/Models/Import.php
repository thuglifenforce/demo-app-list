<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
    use HasFactory;

    protected $fillable = [ 'ressource','nom', 'prenom', 'heure_de_debut', 'nombre_de_personnes', 'code_de_reservation', 'confirmer'];
}
