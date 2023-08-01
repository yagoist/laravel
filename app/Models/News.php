<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
      'title',
      'author',
      'status',
      'description',
      'image'
    ];

    protected $casts = [
      'categories_id' => 'array'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news', 'news_id', 'category_id');
    }
}
