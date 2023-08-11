<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tagsInPost extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'tag_id'
    ];



    /**
     * Get the post that owns the tagsInPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(post::class, 'foreign_key', 'other_key');
    }


    /**
     * Get the tag that owns the tagsInPost
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(tag::class, 'foreign_key', 'other_key');
    }

}
