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
    protected $fillable     = ['uuid', 'commonUuid', 'code', 'counter', 'langUuid', 'fieldUuid', 'name', 'sort', 'isFeatured', 'dataLang', 'data'];
    protected $casts        = [
        'is_featured'   => 'boolean',
        'data_lang'     => 'array',
        'data'          => 'array'
    ];
    public $with            = ['lang'];
}
