<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeDaytrip extends Model
{
    use HasFactory;

     /**
     * table
     *
     * @var string
     */
    protected $table = 'type_daytrip';

    protected $fillable = [
        'typ_day_name',
        'typ_day_description',
        'status_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /* Relationships */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
