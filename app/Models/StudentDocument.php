<?php

namespace App\Models;

use Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;

class StudentDocument extends Model implements AuditableContract
{

    use HasFactory, UsesTenantConnection, SoftDeletes, SoftCascadeTrait, Auditable;


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_documents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stu_doc_url',
        'stu_doc_name_file',
        'type_document_id',
        'student_id',
        'status_id'
    ];


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
     * typeDocument
     *
     * @return BelongsTo
     */
    public function typeDocument() : BelongsTo
    {
        return $this->belongsTo(typeDocument::class, 'type_document_id');
    }


    /**
     * student
     *
     * @return BelongsTo
     */
    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
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
