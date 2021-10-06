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

class Company extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'companies';

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status_id'];

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
    protected $softCascade = ['campus'];

    protected $fillable = [
        'co_name',
        'co_description',
        'co_website',
        'co_assigned_site',
        'co_facebook',
        'co_instagram',
        'co_linkedin',
        'co_youtube',
        'co_info_mail',
        'co_matrix',
        'co_logo',
        'co_color',
        'co_pay_notification',
        'co_ruc',
        'co_business_name',
        'co_comercial_name',
        'co_legal_identification',
        'co_agent_legal',
        'co_person_type',
        'co_direction',
        'co_phone',
        'co_email',
        'status_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at','updated_at','deleted_at'];

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status () : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
