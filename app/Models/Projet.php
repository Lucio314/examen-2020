<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use HasFactory;
    protected $primaryKey = 'codeProjet';
    public $incrementing = false;
    protected $guarded = [];
    public function localite()
    {
        return $this->belongsTo(Localite::class, 'codLocalite', 'codLocalite');
    }
    public function suivis()
    {
        return $this->hasMany(Suivi::class, 'codeProjet', 'codeProjet');
    }
}
