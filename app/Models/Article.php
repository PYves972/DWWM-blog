<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'status',
        'published_at',
        'id_category',
        'category_id',
        'id_user',
        'user_id',
    ];

    /**
     * Relation avec la Catégorie
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Relation avec l'Auteur
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Relation avec les Tags (Manquante !)
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'articles_tags', 'id_article', 'id_tag');
    }

    /**
     * Relation avec les Commentaires
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'id_article');
    }
}
