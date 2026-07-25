<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'id_user',
        'id_article',
    ];

    /**
     * L'auteur du commentaire.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    /**
     * L'article sur lequel porte le commentaire.
     */
    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class, 'id_article');
    }
}
