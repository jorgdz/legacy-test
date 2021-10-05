<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use OwenIt\Auditing\Auditable;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Department extends Model  implements AuditableContract
{
    use HasFactory, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'departments';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'dep_name',
        'dep_description',
        'parent_id',
        'status_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
        'parent_id',
        // 'pivot',
    ];


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
     * positions 
     *
     * @return HasMany
     */
    public function positions(): HasMany
    {
        return $this->hasMany(Position::class);
    }



    public function children()
    {
        return $this->hasMany(Department::class, 'parent_id')->with('status')->with('children')->where(function ($query) {
          
         
            if (isset(request()->query()['status_id'])){
                $query->where('status_id',request()->query()['status_id']);
            }
            if (isset(request()->query()['data'])){
               
                $query->where('status_id', 1);
            }
        });
    }
}
