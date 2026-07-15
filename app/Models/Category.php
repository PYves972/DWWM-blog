<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- Ajout de l'import ici
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory; // <-- Placé correctement ici

    protected $fillable = [ // <-- Remplacement du "-" par "="
        'name',
        'slug',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
