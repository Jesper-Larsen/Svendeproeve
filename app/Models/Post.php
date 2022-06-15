<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'slug'];

    public function scopeSlugLike($query, $slug)
    {
        return $query->where('slug', 'like', $slug . '%');
    }
    public function scopeWithSlug($query, $slug)
    {
        return $query->whereSlug($slug);
    }

    public function getUrlAttribute()
    {
        return route('posts.single', $this->slug);
    }

    public function getExcerptAttribute()
    {
        return Str::limit($this->content, 100);
    }

    public function getEditUrlAttribute()
    {
        return route('posts.edit', $this->slug);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
