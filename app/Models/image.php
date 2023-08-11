<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    use HasFactory;



/**
 * The attributes that are mass assignable.
 *
 * @var array
 */
protected $fillable = [
    'url',
    'post_id'
];



/**
 * Get the post that owns the image
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function post(): BelongsTo
{
    return $this->belongsTo(post::class);
}


}
