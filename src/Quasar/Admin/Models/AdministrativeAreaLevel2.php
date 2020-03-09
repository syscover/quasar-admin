<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class AdministrativeAreaLevel2
 * @package Quasar\Admin\Models
 */

class AdministrativeAreaLevel2 extends CoreModel
{
    protected $table        = 'admin_administrative_area_level_2';
    protected $fillable     = ['uuid', 'countryCommonUuid', 'administrativeAreaLevel1Uuid', 'code', 'customCode', 'name', 'slug'];
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'countryCommonUuid', 'uuid');
    }

    public function AdministrativeAreaLevel1()
    {
        return $this->belongsTo(AdministrativeAreaLevel1::class, 'administrative_area_level_1_uuid', 'uuid');
    }

    public function AdministrativeAreasLevel3()
    {
        return $this->hasMany(AdministrativeAreaLevel3::class, 'administrative_area_level_2_uuid', 'uuid');
    }
}
