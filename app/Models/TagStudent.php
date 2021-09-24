<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TagStudent extends Model implements AuditableContract
{
    use HasFactory,Auditable,SoftDeletes;

    protected $table = 'tags';

    protected $dates = ['deleted_at'];

    protected $hidden = ['created_at','updated_at','deleted_at'];

    protected $fillable = [
        'tg_name',
        'tg_description',
        'status_id',
    ];

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
