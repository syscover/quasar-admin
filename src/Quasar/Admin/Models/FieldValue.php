<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Traits\Langable;

/**
 * Class FieldValue
 * @package Quasar\Admin\Models
 */

class FieldValue extends CoreModel
{
    use Langable;
    
    protected $table        = 'admin_field_value';
    protected $fillable     = ['uuid', 'code', 'counter', 'langUuid', 'fieldUuid', 'name', 'sort', 'featured', 'dataLang', 'data'];
    protected $casts        = [
        'featured'  => 'boolean',
        'dataLang'  => 'array',
        'data'      => 'array'
    ];
    public $with            = ['lang'];

    public function values()
    {
        return $this->hasMany(FieldValue::class, 'field_uuid', 'uuid');
    }
}
