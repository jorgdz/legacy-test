<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Typekinship extends Model
{
    use HasFactory;

     /**
     * table
     *
     * @var string
     */
    protected $table = 'type_kinship';

    protected $fillable = [
        'typ_kin_name',
        'typ_kin_description',
        'status_id',
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
