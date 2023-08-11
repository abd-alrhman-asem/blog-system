<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable  = [
        'title',
        'content' ,
        'user_id' ,
        'categoty_id' ,
    ];


    /**
     * Get the user that owns the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the images for the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(image::class);
    }

    /**
     * Get the category that owns the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the tags for the post
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags(): HasMany
    {
        return $this->hasMany(tagsInPost::class);
    }

}
