<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Pensum extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection;

    protected $table = 'pensums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['anio', 'status_id'];

    protected $dates = ['deleted_at'];

    protected $softCascade = ['meshs'];

    /* Relationship */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    public function meshs() {
        return $this->hasMany(Mesh::class);
    }

    /* TODO: Add softCascade */
    /* public function student_records() {
        return $this->hasMany(StudentRecord::class);
    } */
}
