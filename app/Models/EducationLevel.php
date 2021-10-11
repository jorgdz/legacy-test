<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class EducationLevel extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'education_levels';

    protected $relations = ['offer_id', 'status_id'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [

        'edu_name',
        'edu_alias',
        'edu_order',
        'principal_id',
        'offer_id',
        'status_id',

    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * softCascade
     *
     * @var array
     */
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
     * @return HasMany
     */
    public function meshs() :  HasMany{
        return $this->hasMany(Curriculum::class, 'level_edu_id');
    }

    /**
     * offer
     *
     * @return BelongsTo
     */
    public function offer() : BelongsTo {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function children() {
        return $this->hasMany(EducationLevel::class, 'principal_id')->with(['status', 'offer', 'meshs' => function($query) {
            $query->where('status_id', 7);
        }, 'children'])->where(function($query) {
            if (isset(request()->query()['data'])) $query->where('status_id', 1);
        });
    }

    public function child(): HasMany {
        return $this->hasMany(EducationLevel::class, 'principal_id')->with('child')->where(function($query) {
            $query->where('status_id', 1);
        });
    }

    public function matter() {
        return $this->hasMany(Subject::class, 'education_level_id');
    }

    /**
     * Classroom Education Level
     *
     * @return void
     */
    public function classroomEducationLevel(): HasMany {
        return $this->hasMany(ClassroomEducationLevel::class,'education_level_id');
    }

    /**
     * educationLevelSubject
     *
     * @return HasMany
     */
    public function educationLevelSubject() : HasMany
    {
        return $this->hasMany(EducationLevelSubject::class, 'education_level_id');
    }
}
