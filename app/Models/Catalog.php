<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class Catalog extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'catalogs';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'cat_name',
        'cat_acronym',
        'cat_description',
        'cat_keyword',
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
        'pivot',
    ];

    /**
     * scopeGetKeyword
     *
     * @param  mixed $query
     * @param  mixed $keyword
     * @return void
     */
    public function scopeGetKeyword($query, mixed $keyword)
    {
        return $query->where('cat_keyword', $keyword);
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function persons() : BelongsToMany
    {
        return $this->belongsToMany(Person::class);
    }

    public function children() {
        return $this->hasMany(Catalog::class, 'parent_id')->with('status')->with('children')->where(function($query) {
            if (isset(request()->query()['data'])) $query->where('status_id', 1);
        });
    }

    /**
     * Course
     *
     * @return void
     */
    public function course(): HasMany {
        return $this->hasMany(Course::class,'modality_id');
    }
}
