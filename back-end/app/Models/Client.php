<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'CIN', 'csc','probleme_id'];

    public function probleme()
    {
        return $this->hasOne(Probleme::class);
    }
    public function reclamation()
    {
        return $this->belongsTo(Reclamation::class);
    }
}