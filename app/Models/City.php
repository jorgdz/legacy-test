<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class City extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'cities';

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
        
    /**
     * institutes
     *
     * @return HasMany
     */
    public function institutes (): HasMany
    {
        return $this->hasMany(Institute::class, 'city_id');
    }
        
    /**
     * cities
     *
     * @return HasMany
     */
    public function persons (): HasMany
    {
        return $this->hasMany(Person::class, 'city_id');
    }
}
