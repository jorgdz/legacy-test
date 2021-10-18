<?php

namespace App\Repositories;

use App\Exceptions\Custom\NotFoundException;
use App\Models\ClassRoom;
use App\Models\Course;
use App\Repositories\Base\BaseRepository;

class ClassRoomRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['campus', 'classroomType', 'classroomEducationLevel', 'status'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['campus', 'classroom_types', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'cl_name',
        'cl_cap_max',
        'cl_acronym',
        'cl_description',
    ];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'cl_name', 'cl_cap_max', 'cl_acronym', 'cl_description',
        'cam_name', 'cam_description', 'cam_direction', 'cam_initials',
        'clt_name',
        'st_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(ClassRoom $classRoom)
    {
        parent::__construct($classRoom);
    }


    public function getClassromsByCampusRepository($campus)
    {

        $id = $campus->id;
        $condition = [
            ['campus_id', $id]
        ];

        $query = $this->model;

        if (isset(request()->query()['data'])) {
            $query =  $this->model->where('campus_id', $id)->with(['classroomType'])->get();
            return (request()->query()['data'] === 'all') ? $query : [];
        }

        return $this->data
            ->withModelRelations([
                'classroomType'
            ])
            ->searchWithColumnNames(request())
            ->searchWithConditions(['conditions' => $condition])
            ->filter(
                request(),
                $this->fields,
                $this->model->getRelations(),
                $this->model->getKeyName(),
                $this->model->getTable()
            )
            ->paginated(request(), $this->model->getTable());
            
        
       
    }

    /**
     * findCoursesByClassroom
     *
     * @param  mixed $id
     * @return void
     */
    public function findCoursesByClassroom($id)
    {
        $courses = Course::with([
            'parallel',
            'classroom',
            'modality', 'hourhand',
            'collaborator',
            'curriculum',
            'period',
            'status'
        ])->where('classroom_id', $id);

        if ($courses->count() == 0)
            throw new NotFoundException(__('messages.not-found'));

        return $courses->get();
    }


    public function findByConditionals($conditionals)
    {
        $query = $this->model;
        if (isset(request()->query()['search'])) {
            if (!empty($this->relations)) {
                $query = $query->with($this->relations);
            }

            return $query->where($conditionals)->get();
        }
    }
}
