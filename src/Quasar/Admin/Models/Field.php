<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Field
 * @package Quasar\Admin\Models
 */

class Field extends CoreModel
{
    protected $table        = 'admin_field';
    protected $fillable     = ['uuid', 'fieldGroupUuid', 'name', 'labels', 'fieldTypeUuid', 'sourceUuid', 'fieldTypeName', 'dataTypeUuid', 'dataTypeName', 'isRequired', 'sort', 'maxlength', 'pattern', 'class', 'dataLang', 'data'];
    protected $casts        = [
        'labels'        => 'array',
        'is_required'   => 'boolean',
        'data_lang'     => 'array',
        'data'          => 'array'
    ];
    public $with            = ['values'];

    public function values()
    {
        return $this->hasMany(FieldValue::class, 'field_uuid', 'uuid');
    }
}
