<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class role extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get all of the permissions for the role
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permissions(): HasMany
    {
        return $this->hasMany(permiessionInRole::class);
    }


   /**
    * Get all of the users for the role
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function users(): HasMany
   {
       return $this->hasMany(userHasRole::class);
   }


}
