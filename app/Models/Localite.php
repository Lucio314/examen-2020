<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnValue;

class Localite extends Model
{
    use HasFactory;
    protected $primaryKey = 'codLocalite';
    protected $guarded = [];

    public function projets()
    {
        return $this->hasMany(Projet::class, 'codLocalite', 'codLocalite');
    }
}
