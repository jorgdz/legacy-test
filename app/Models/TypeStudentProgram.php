<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeStudentProgram extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, Auditable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_student_programs';

    protected $relations = ['status_id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'typ_stu_pro_name',
        'typ_stu_pro_description',
        'typ_stu_pro_acronym',
        'status_id'
    ];


    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
