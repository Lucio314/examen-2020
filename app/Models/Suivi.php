<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suivi extends Model
{
    use HasFactory;
    protected $primaryKey = 'numSuivi';
    protected $guarded = [];
    public function projet()
    {
        return $this->belongsTo(Projet::class, 'codeProjet', 'codeProjet');
    }
}
