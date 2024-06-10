<?php

namespace App\Models;

use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chambre extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'floor',
        'category_id',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
}
