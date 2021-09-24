<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class BloodType extends Model implements AuditableContract
{
    use HasFactory,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'blood_type';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'blo_typ_name',
        'blo_typ_description',
        'status_id',
    ];

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
    public function status(): BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
