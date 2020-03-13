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
        'administrative_areas'  => 'array',
        'data_lang'             => 'array'
    ];
    public $with            = [
        'lang',
        'administrativeAreasLevel1',
        'administrativeAreasLevel2',
        'administrativeAreasLevel3'
    ];

    public function administrativeAreasLevel1()
    {
        return $this->hasMany(AdministrativeAreaLevel1::class, 'country_common_uuid', 'common_uuid')->orderBy('name', 'asc');
    }

    public function administrativeAreasLevel2()
    {
        return $this->hasMany(AdministrativeAreaLevel2::class, 'country_common_uuid', 'common_uuid')->orderBy('name', 'asc');
    }

    public function administrativeAreasLevel3()
    {
        return $this->hasMany(AdministrativeAreaLevel3::class, 'country_common_uuid', 'common_uuid')->orderBy('name', 'asc');
    }
}
