<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'status','client_id'];
    public function client()
    {
        return $this->hasOne(Client::class);
    }
}