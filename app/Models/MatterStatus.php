<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class MatterStatus extends Model
{
    use HasFactory, SoftDeletes, SoftCascadeTrait, UsesTenantConnection;

    protected $table = 'matter_status';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'type', 'status_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    protected $dates = ['deleted_at'];

    protected $softCascade = [];

    /* Relationships */
    public function status() {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /* TODO: Add softCascade */
    /* public function course_student() {
        return $this->hasMany(CourseStudent::class);
    } */
}