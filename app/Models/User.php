<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable; // <-- Ajouté ici !

    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
    ];

    public function articles(): HasMany
    {
        return $this->hasMany(Article::class);
    }
}
