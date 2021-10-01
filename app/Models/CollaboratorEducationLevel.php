<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaboratorEducationLevel extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'collaborator_education_levels';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collaborator_id',
        'education_level_id',
        'status_id'
    ];

    /**
     * offer
     *
     * @return BelongsTo
     */
    public function collaborator() : BelongsTo {
        return $this->belongsTo(Collaborator::class, 'collaborator_id');
    }
    
    /**
     * educationLevel
     *
     * @return BelongsTo
     */
    public function educationLevel() : BelongsTo {
        return $this->belongsTo(EducationLevel::class, 'education_level_id');
    }

    /**
     * status
     *
     * @return BelongsTo
     */
    public function status() : BelongsTo {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
