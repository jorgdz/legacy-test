<?php

namespace App\Models;

use Spatie\Multitenancy\Models\Tenant;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

/**
 * CustomTenant
 */
class CustomTenant extends Tenant implements AuditableContract
{
    use HasFactory, SoftDeletes, Auditable;

    protected $table = 'tenants';

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'domain',
        'domain_client',
        'database',
        'logo_name',
        'logo_path',
        'logo_path',
        'description',
        'website',
        'assigned_site',
        'facebook',
        'instagram',
        'linkedin',
        'youtube',
        'info_mail',
        'matrix',
        'color',
        'students_number',
        'status_id',
    ];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * setNameAttribute
     *
     * Lower case tenant name
     * @param  mixed $value
     * @return void
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value);
    }

    /**
     * getNameAttribute
     *
     * Accesor uppercase tenant name
     * @param  mixed $value
     * @return void
     */
    public function getNameAttribute($value)
    {
        return ucwords($value);
    }

    /**
     * setDomainAttribute
     *
     * Lower case tenant domin
     * @param  mixed $value
     * @return void
     */
    public function setDomainAttribute($value)
    {
        $this->attributes['domain'] = strtolower($value);
    }

    /**
     * mail
     *
     * @return void
     */
    public function mail()
    {
        return $this->hasOne(Mail::class, 'tenant_id');
    }

    /**
     * filesystem
     *
     * @return void
     */
    public function filesystem()
    {
        return $this->hasOne(CustomFilesystem::class, 'tenant_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(CustomStatus::class, 'status_id');
    }
}
