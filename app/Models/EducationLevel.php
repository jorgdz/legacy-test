<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EducationLevel extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    protected $table = 'education_levels';

    protected $fillable = [

        'edu_name',
        'edu_alias',
        'edu_order',
        'principal_id',
        'offer_id',
        'status_id',

    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    protected $dates = ['deleted_at'];

    protected $softCascade = ['meshs', 'studentRecords'];

    /**
     * studentRecords
     *
     * @return HasMany
     */
    public function studentRecords(): HasMany {
        return $this->hasMany(StudentRecord::class);
    }

    /**
     * meshs
     *
     * @return void
     */
    public function meshs() {
        return $this->hasMany(Mesh::class, 'level_edu_id');
    }

    /**
     * offer
     *
     * @return void
     */
    public function offer() {
        return $this->belongsTo(Offer::class, 'offer_id');
    }
    
    /**
     * status
     *
     * @return void
     */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function children() {
        return $this->hasMany(EducationLevel::class, 'principal_id')->with('offer')->with('status')->with('children')->where(function($query) {
            if (isset(request()->query()['data'])) $query->where('status_id', 1);
        });
    }

    public function child(): HasMany {
        return $this->hasMany(EducationLevel::class, 'principal_id')->with('child')->where(function($query) {
            $query->where('status_id', 1);
        });
    }

    public function matter() {
        return $this->hasMany(Matter::class, 'education_level_id');
    }
}
