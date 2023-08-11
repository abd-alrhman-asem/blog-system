<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiession extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable  = [
        'name'
    ];

    /**
     * Get all of the permiession_in_rol for the permiession
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roles(): HasMany
    {
        return $this->hasMany(permiessionInRole::class);
    }
}
