<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class TypeMatter extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection;

    protected $table = 'type_matters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['tm_name', 'tm_description', 'tm_order', 'mt_cobro', 'mt_matter_count', 'status_id'];

    protected $hidden = [];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['matters'];

    /* Relationship */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function matters() {
        return $this->hasMany(Matter::class, 'type_matter_id');
    }
}
