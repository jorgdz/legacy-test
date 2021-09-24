<?php

namespace App\Repositories;

use App\Models\Campus;
use App\Repositories\Base\BaseRepository;

/**
 * CampusRepository
 */
class CampusRepository extends BaseRepository
{

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['company', 'status', 'periods'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['companies', 'status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['cam_name', 'cam_description', 'cam_direction', 'cam_initials'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = [
        'cam_name',
        'cam_description',
        'cam_direction',
        'cam_initials',
        'co_name',
        'co_description',
        'co_website',
        'co_assigned_site',
        'co_facebook',
        'co_instagram',
        'co_linkedin',
        'co_youtube',
        'co_info_mail',
        'co_matrix',
        'co_logo',
        'co_color',
        'co_pay_notification',
        'co_ruc',
        'co_business_name',
        'co_comercial_name',
        'co_legal_identification',
        'co_agent_legal',
        'co_person_type',
        'co_direction',
        'co_phone',
        'co_email',
        'st_name'
    ];


    /**
     * selected
     *
     * @var array
     */
    protected $selected = ['id', 'cam_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Campus $campus) {
        parent::__construct($campus);
    }
}
