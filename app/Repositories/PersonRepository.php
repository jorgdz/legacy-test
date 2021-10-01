<?php

namespace App\Repositories;

use App\Models\Person;
use App\Repositories\Base\BaseRepository;

class PersonRepository extends BaseRepository
{


    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'identification',
        'religion',
        'statusMarital',
        'city',
        'currentCity',
        'sector',
        'ethnic',
        'user',
        'livingPlace',
        'personJob',
        'languages',
        'emergencyContact',
        'personRelatives',
        'associatedPerson',
        'disabilities'
    ];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = [
        'pers_identification',
        'pers_firstname',
        'pers_secondname',
        'pers_first_lastname',
        'pers_second_lastname',
        'pers_gender',
        'us_username', 'email',
        'identification.cat_name',
        'religion.cat_name',
        'statusMarital.cat_name',
        'city.cat_name',
        'city.cat_acronym',
        'currentCity.cat_name',
        'currentCity.cat_acronym',
        'sector.cat_name',
        'ethnic.cat_name',
        'livingPlace.cat_name'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Person $person) {
        parent::__construct($person);
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return void
     */
    public function all ($request) {

        if (isset($request['data']))
            return ($request['data'] === 'all') ? $this->data->withOutPaginate($this->selected)->getCollection() : [];

        $query = Person::select(
            'persons.*',
            'u.id as user_id',
            'u.us_username',
            'u.email')->join('users as u','u.person_id','=','persons.id')->join('catalogs as identification', 'identification.id','=', 'persons.type_identification_id')
                    ->join('catalogs as religion', 'religion.id', '=', 'persons.type_religion_id')
                    ->join('catalogs as statusMarital', 'statusMarital.id', '=', 'persons.status_marital_id')
                    ->join('catalogs as city', 'city.id', '=', 'persons.city_id')
                    ->join('catalogs as currentCity', 'currentCity.id', '=', 'persons.current_city_id')
                    ->join('catalogs as sector', 'sector.id', '=', 'persons.sector_id')
                    ->join('catalogs as ethnic', 'ethnic.id', '=', 'persons.ethnic_id')
                    ->join('catalogs as livingPlace', 'livingPlace.id', '=', 'persons.vivienda_id')
                    ->with([
                        'identification', 'religion',
                        'statusMarital', 'city',
                        'currentCity', 'sector',
                        'ethnic', 'user',
                        'livingPlace', 'personJob',
                        'languages', 'emergencyContact',
                        'personRelatives', 'associatedPerson',
                        'disabilities'
                    ]);

        $collectQueryString = collect($request->all())
            ->except(['page', 'size', 'sort', 'type_sort', 'user_profile_id', 'search'])->all();

        if (!empty($collectQueryString)) {
            $query = $query->where($collectQueryString);
        }

        $sort = $request->sort ? $request->sort : $this->model->getTable().'.id';
        $type_sort = $request->type_sort ? $request->type_sort : 'desc';

        if ($request->search) {
            $fields = $this->fields;
            $query= $query->where(function ($query) use($fields, $request) {
                for ($i = 0; $i < count($fields); $i++){
                    $query->orwhere($fields[$i], 'like',  '%' . $request->search .'%');
                }
            });
        }

        return $query->orderBy($sort, $type_sort)->paginate($request->size ? $request->size : 100);
    }

}
