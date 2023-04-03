<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'content'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            $post->slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $post->title);
        });
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeStatus($query, $bool)
    {
        return $query->where('active', $bool);
    }

    public function scopeSelectBySlug($query, $id)
    {
        return $query->where('slug', $id);
    }
}
