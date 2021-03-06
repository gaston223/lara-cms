<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{
    use SoftDeletes;

    protected $fillable =[
        'title', 'description', 'content', 'image', 'published_at', 'category_id,', 'user_id'
    ];

    /**
     * Suppression de l'image
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Verifie si les posts ont des tags
     * @param $tagId
     * @return bool
     */
    public function hasTag($tagId)
    {
        return in_array($tagId, $this->tags->pluck('id')->toArray() );
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeSearched($query)
    {
        $search = request()->query('search');

        if(!$search){
            return $query;
        }

        return $query
            ->where('title', 'LIKE', "%{$search}%");
    }

}
