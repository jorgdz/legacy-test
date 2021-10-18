<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeCalification extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection,Auditable;

    protected $table = 'type_califications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tc_name', 'tc_description', 'status_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['matters'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * matters
     *
     * @return HasMany
     */
    public function matters() : HasMany {
        return $this->hasMany(Subject::class, 'type_calification_id');
    }

    
    /**
     * Student Record PeriodSubject
     *
     * @return void
     */
    public function typeScore () {
        return $this->hasMany(StudentRecordPeriodSubject::class,'type_score_id');
    }

     /**
     * Student Record PeriodSubject
     *
     * @return void
     */
    public function typeTest () {
        return $this->hasMany(StudentRecordPeriodSubject::class,'type_test_id');
    }
}
