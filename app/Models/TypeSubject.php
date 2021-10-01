<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

//class TypeMatter extends Model implements AuditableContract
class TypeSubject extends Model implements AuditableContract
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection,Auditable;

    protected $table = 'type_subjects';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tm_name', 'tm_acronym', 'tm_description', 'tm_order', 'tm_cobro', 'tm_matter_count', 'status_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];


    // ¿Se deberia eliminar las materias en cascada cuando se elimina un tipo materia?. No lo creo...
    // protected $softCascade = ['matter'];


    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     * SubjectStatus
     *
     * @return HasMany
     */
    public function matterStatus() : HasMany {
        return $this->hasMany(SubjectStatus::class, 'type_matter_id');
    }

    /**
     * matterStatus
     *
     * @return HasMany
     */
    public function matter() : HasOne {
        return $this->hasOne(Subject::class, 'type_matter_id');
    }

    public function matter() : HasMany {
        return $this->hasMany(Matter::class);
    }
}
