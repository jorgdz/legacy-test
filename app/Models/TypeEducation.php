<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class TypeEducation extends Model implements AuditableContract
{
    use HasFactory,Auditable;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'type_education';

    protected $fillable = [
        'typ_edu_name',
        'typ_edu_description',
        'status_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
