<?php

namespace App\Repositories;

use App\Models\Offer;
use App\Models\Period;
use App\Http\Resources\OfferResources;
use App\Repositories\Base\BaseRepository;

class OfferRepository extends BaseRepository
{
    protected $relations = ['status', 'periods', 'educationLevels', 'simbologies'];
    protected $fields = ['off_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Offer $offer) {
        parent::__construct($offer);
    }

    /**
     * showSimbologiesByOffer
     *
     * @param  mixed $offer
     * @return void
     */
    public function showSimbologiesByOffer (Offer $offer) {
        $query = $offer->simbologies()->wherePivot('offer_id', $offer->id)->with(['matterMesh']);

        $fields = ['sim_description'];

        if (isset(request()->query()['search'])) {
            $query = $query->where(function ($query) use ($fields) {
                for($i = 0; $i < count($fields); $i ++) {
                    $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) .'%');
                }
            });
        }

        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';

        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ?: 100);
    }

    /**
     * showPeriodByOffer
     *
     * @param  mixed $offer
     * @param  mixed $period
     * @return void
     */
    public function showPeriodByOffer (Offer $offer, Period $period) {
        $periodFound = $offer->periods()->wherePivot('period_id', $period->id)->first();
        return $periodFound;
    }

    /**
     * showPeriodsByOffer
     *
     * @param  mixed $offer
     * @return void
     */
    public function showPeriodsByOffer (Offer $offer) {
        $query = $offer->periods()->wherePivot('offer_id', $offer->id)->with(['typePeriod', 'campus', 'status']);

        $fields = ['per_name', 'per_reference', 'per_current_year', 'per_due_year', 'per_min_matter_enrollment', 'per_max_matter_enrollment'];

        if (isset(request()->query()['search'])) {
            $query = $query->where(function ($query) use ($fields) {
                for($i = 0; $i < count($fields); $i ++) {
                    $query->orwhere($fields[$i], 'like',  '%' . strtolower(request()->query()['search']) .'%');
                }
            });
        }

        $sort = isset(request()->query()['sort']) ? request()->query()['sort'] : 'id';
        $type_sort = isset(request()->query()['type_sort']) ? request()->query()['type_sort'] : 'desc';

        return $query->orderBy($sort, $type_sort)->paginate(isset(request()->query()['size']) ?: 100);
    }
    
    /**
     * find @override
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id) {
        $query = $this->model;
        if ($key = array_search('educationLevels', $this->relations)) {
            unset($this->relations[$key]);
            $query = $query->with(['educationLevelsParent' => function($query) {
                $query->where([
                    ['principal_id', NULL],
                    ['status_id', 1],
                ]);
            }]);
        };

        if ($this->relations) $query = $query->with($this->relations);

        return new OfferResources($query->findOrFail($id));
    }
}
