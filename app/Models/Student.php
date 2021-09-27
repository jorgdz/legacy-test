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
     * @return void
     */
    public function modality ()
    {
        //return $this->belongsTo(Modality::class, 'modalidad_id');
    }

    /**
     * campus
     *
     * @return void
     */
    public function campus ()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    /**
     * daytrip
     *
     * @return void
     */
    public function daytrip ()
    {
        return $this->belongsTo(TypeDaytrip::class, 'jornada_id');
    }

    /**
     * user
     *
     * @return void
     */
    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * studentDocuments
     *
     * @return void
     */
    public function studentDocuments()
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
