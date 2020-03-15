<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fact extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function tags()
    {
        return $this->morphToMany(
            Tag::class,
            'taggable'
        );
    }
    
    public function scopeTagged($query, $tag)
    {
        if (!$tag) {
            return $query;
        }
        
        if ((int) $tag > 0) {
            return $query->whereHas('tags', function ($q) use ($tag) {
                $q->where('id', $tag);
            });
        }
    
        return $query->whereHas('tags', function ($q) use ($tag) {
            $q->where('name', 'like', "%$tag%");
        });
    }
}
