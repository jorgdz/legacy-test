<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Matter extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection;

    protected $table = 'matters';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_mate_migration', 'cod_old_migration', 'des_matter', 
        'type_matter_id', 'type_calification_id', 'min_note', 'status_id'
    ];
    protected $hidden = [];
    protected $dates = ['deleted_at'];

    
    /* Relationship */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function typeMatter() {
        return $this->belongsTo(TypeMatter::class, 'type_matter_id');
    }

    public function typeCalification() {
        return $this->belongsTo(TypeCalification::class, 'type_calification_id');
    }
}
