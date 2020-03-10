<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class AdministrativeAreaLevel3
 * @package Quasar\Admin\Models
 */

class AdministrativeAreaLevel3 extends CoreModel
{
    protected $table        = 'admin_administrative_area_level_3';
    protected $fillable     = ['uuid', 'countryCommonUuid', 'administrativeAreaLevel1Uuid', 'administrativeAreaLevel2Uuid', 'code', 'customCode', 'name', 'slug', 'latitude', 'longitude', 'zoom'];
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'countryCommonUuid', 'uuid');
    }

    public function AdministrativeAreaLevel1()
    {
        return $this->belongsTo(AdministrativeAreaLevel1::class, 'administrative_area_level_1_uuid', 'uuid');
    }

    public function AdministrativeAreaLevel2()
    {
        return $this->belongsTo(AdministrativeAreaLevel2::class, 'administrative_area_level_2_uuid', 'uuid');
    }
}
