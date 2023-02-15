<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;

//    protected $fillable = ['title' , 'excerpt', 'body'];
    protected $guarded = ['id'];
    protected $with = ['category' , 'user'];


    public function scopeFilter ($query, array $filters)
    {

        $query->when($filters['search'] ?? false, function ($query, $search)
        {
            return $query->where('title', 'like', '%' . $search . '%' )
                ->orWhere('body', 'like', '%' . $search . '%' );
        });

        $query->when($filters['category'] ?? false, function ($query, $category)
        {
            return $query->whereHas('category', function ($query) use ($category)
            {
                $query->where('slug', $category);
            });

        });

        $query->when($filters['user'] ?? false, fn ($query, $author) =>
        $query->whereHas('user', fn ($query) =>
        $query->where('username', $author)
        )
        );


    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->HasMany(Comment::class)->whereNull('parent_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';

    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
