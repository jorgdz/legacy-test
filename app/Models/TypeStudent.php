<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class TypeStudent extends Model
{
    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'te_name',
        'te_description',
        'status_id',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'type_students';

    /**
     * dates
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * softCascade
     *
     * @var array
     */
    protected $softCascade = ['studentRecords'];


    /**
     * studentRecords
     *
     * @return HasMany
     */
    public function studentRecords(): HasMany
    {
        return $this->hasMany(StudentRecord::class);
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
