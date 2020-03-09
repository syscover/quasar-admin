<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class AdministrativeAreaLevel1
 * @package Quasar\Admin\Models
 */

class AdministrativeAreaLevel1 extends CoreModel
{
    protected $table        = 'admin_administrative_area_level_1';
    protected $fillable     = ['uuid', 'countryCommonUuid', 'code', 'customCode', 'name', 'slug'];
    
    public function country()
    {
        return $this->belongsTo(Country::class, 'countryCommonUuid', 'uuid');
    }

    public function AdministrativeAreasLevel2()
    {
        return $this->hasMany(AdministrativeAreaLevel2::class, 'administrative_area_level_1_uuid', 'uuid');
    }
}
