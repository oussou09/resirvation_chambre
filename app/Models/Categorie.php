<?php

namespace App\Models;

use App\Models\Chambre;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    public function chambres()
    {
        return $this->hasMany(Chambre::class);
    }
}
