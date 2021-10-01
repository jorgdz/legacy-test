<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CollaboratorCampus extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'collaborator_campus';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'collaborator_id',
        'campus_id',
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
     * offer
     *
     * @return BelongsTo
     */
    public function campus() : BelongsTo {
        return $this->belongsTo(Campus::class, 'campus_id');
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
