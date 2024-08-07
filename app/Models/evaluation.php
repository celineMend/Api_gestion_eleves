<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class evaluation extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }

    // Relation avec le modèle Matiere
    public function matiere()
    {
        return $this->belongsTo(Matiere::class);
    }
}

