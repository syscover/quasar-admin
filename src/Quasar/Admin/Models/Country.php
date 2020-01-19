<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Traits\Langable;

/**
 * Class Country
 * @package Quasar\Admin\Models
 */

class Country extends CoreModel
{
    use Langable;

    protected $table        = 'admin_country';
    protected $fillable     = ['uuid', 'commonUuid', 'langUuid', 'iso3166Alpha2', 'iso3166Alpha3', 'iso3166Numeric', 'customCode', 'prefix', 'name', 'slug', 'image', 'sort', 'administrativeAreaLevel1', 'administrativeAreaLevel2', 'administrativeAreaLevel3', 'administrativeAreas', 'latitude', 'longitude', 'zoom', 'dataLang'];
    protected $maps         = ['iso_3166_alpha_2' => 'iso3166Alpha2', 'iso_3166_alpha_3' => 'iso3166Alpha3', 'iso_3166_numeric' => 'iso3166Numeric', 'administrative_area_level_1' => 'administrativeAreaLevel1', 'administrative_area_level_2' => 'administrativeAreaLevel2', 'administrative_area_level_3' => 'administrativeAreaLevel3'];
    protected $casts        = [
        'administrativeAreas'   => 'array',
        'dataLang'              => 'array'
    ];
    public $with            = [
        'lang',
        // 'administrativeAreaLevel1',
        // 'administrativeAreaLevel2',
        // 'administrativeAreaLevel3'
    ];

    /* public function administrativeAreaLevel1()
    {
        return $this->hasMany(TerritorialArea1::class, 'country_id', 'id')->orderBy('name', 'asc');
    }

    public function administrativeAreaLevel2()
    {
        return $this->hasMany(TerritorialArea2::class, 'country_id', 'id')->orderBy('name', 'asc');
    }

    public function administrativeAreaLevel3()
    {
        return $this->hasMany(TerritorialArea3::class, 'country_id', 'id')->orderBy('name', 'asc');
    } */

    /* public function getTerritorialAreaName($zone)
    {
        switch ($zone) 
        {
            case 'territorial_areas_1':
                return $this->{'territorial_area_1'};
            case 'territorial_areas_2':
                return $this->{'territorial_area_2'};
            case 'territorial_areas_3':
                return $this->{'territorial_area_3'};
            default;
                return null;
        }
    } */
}
