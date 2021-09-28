<?php

namespace App\Models;

use OwenIt\Auditing\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Student extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'students';

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * guard_name
     *
     * @var string
     */
    protected $guard_name = 'api';

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['studentRecords','studentDocuments']; //courseStudent

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stud_code',
        'stud_photo',
        'stud_photo_path',
        'stud_observation',
        'user_id',
        'status_id',
        'campus_id',
        'modalidad_id',
        'jornada_id'
    ];

    /**
     * studentRecords
     *
     * @return HasMany
     */
    public function studentRecords(): HasMany
    {
        return $this->hasMany(StudentRecord::class);
    }

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
     * modality
     *
     * @return BelongsTo
     */
    public function modality () : BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'modalidad_id');
    }

    /**
     * campus
     *
     * @return BelongsTo
     */
    public function campus () : BelongsTo
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    /**
     * daytrip
     *
     * @return BelongsTo
     */
    public function daytrip () : BelongsTo
    {
        return $this->belongsTo(Catalog::class, 'jornada_id');
    }

    /**
     * user
     *
     * @return BelongsTo
     */
    public function user () : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * studentDocuments
     *
     * @return HasMany
     */
    public function studentDocuments() : HasMany
    {
        return $this->hasMany(StudentDocument::class);
    }

    /**
     * courseStudent
     *
     * @return HasMany
     */
    // public function courseStudent(): HasMany
    // {
    //     return $this->hasMany(CourseStudent::class);
    // }


}
