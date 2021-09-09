<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class OfferPeriod extends Model implements AuditableContract
{
    use HasFactory, UsesTenantConnection,Auditable;

    public $timestamps = false;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_id',
        'period_id'
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'offer_period';


    /**
     * offers
     *
     * @return void
     */
    public function offers ()
    {
        return $this->belongsTo(Offer::class, 'offer_id');
    }

    /**
     * offers
     *
     * @return void
     */
    public function periods ()
    {
        return $this->belongsTo(Period::class, 'period_id');
    }
}
