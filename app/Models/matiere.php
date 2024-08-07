<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class matiere extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

}
