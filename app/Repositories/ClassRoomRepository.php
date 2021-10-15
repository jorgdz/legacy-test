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
        $query = ClassRoom::where('campus_id', $id)->with(['classroomType']);
        $fields = $this->fields;

        if (isset(request()->query()['data'])) {
            return (request()->query()['data'] === 'all') ?  $query->get() : [];
            /* return (request()->query()['data'] === 'all') ?  $this->data
                // ->withOutPaginate($this->selected)
                ->withModelRelations(['classroomType'])
                //->filter(request()->query(), $this->fields, $this->model->getRelations(), $this->model->getKeyName(), $this->model->getTable())
                ->getCollection() : []; */
        }

        if (isset(request()->query()['search'])) {

            $query = $query->where(function ($query) use ($fields) {
                for ($i = 0; $i < count($fields); $i++) {
                    $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) . '%');
                }
            }); 
        }

        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';
        $page = isset(request()->query()['size']) ? request()->query()['size'] : 100;
        return $query->orderBy($sort, $type_sort)->paginate($page);

       
    }

    /**
     * findCoursesByClassroom
     *
     * @param  mixed $id
     * @return void
     */
    public function findCoursesByClassroom ($id) {
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
}
