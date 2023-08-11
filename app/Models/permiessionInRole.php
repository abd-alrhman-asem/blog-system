<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permiessionInRole extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'permiession_id' ,
    ];

    /**
     * Get the roles that owns the permiessionInRole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles(): BelongsTo
    {
        return $this->belongsTo(role::class);
    }

    /**
     * Get the permiessions that owns the permiessionInRole
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permiessions(): BelongsTo
    {
        return $this->belongsTo(permiession::class);
    }
}
