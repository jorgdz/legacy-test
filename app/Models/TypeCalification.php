<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class TypeCalification extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection;

    protected $table = 'type_califications';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tc_name', 'tc_description', 'status_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['matters'];

    /* Relationship */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function matters() {
        return $this->hasMany(Matter::class, 'type_calification_id');
    }
}
