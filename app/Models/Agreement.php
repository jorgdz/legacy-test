<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Agreement extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'agreements';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id','institute_id'];

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'agr_name',
        'agr_num_matter_homologate',
        'agr_start_date',
        'agr_end_date',
        'institute_id',
        'status_id'
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];


    /**
     * institute
     *
     * @return BelongsTo
     */
    public function institute(): BelongsTo
    {
        return $this->belongsTo(Institute::class, 'institute_id');
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

    
    //Parsear
    public function getStatusIdAttribute () {
        return (int) ($this->attributes['status_id']);
    }

    public function getInstituteIdAttribute () {
        return (int) ($this->attributes['institute_id']);
    }
}
