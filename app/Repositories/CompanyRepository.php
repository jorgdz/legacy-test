<?php

namespace App\Repositories;

use App\Models\Company;
use App\Repositories\Base\BaseRepository;

/**
 * CompanyRepository
 */
class CompanyRepository extends BaseRepository
{

    protected $relations = ['campus', 'status'];
    protected $fields = [
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
        'co_email'
    ];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Company $company) {
        parent::__construct($company);
    }
}
