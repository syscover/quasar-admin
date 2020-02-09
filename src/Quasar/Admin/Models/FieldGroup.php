<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class FieldGroup
 * @package Quasar\Admin\Models
 */

class FieldGroup extends CoreModel
{
    protected $table        = 'admin_field_group';
    protected $fillable     = ['uuid', 'name', 'resourceUuid'];
    public $with            = ['resource'];

    public function resource()
    {
        return $this->belongsTo(Resource::class, 'resource_uuid', 'uuid');
    }

    public function fields()
    {
        return $this->belongsToMany(
            Field::class,
            'admin_field_groups_fields',
            'field_group_uuid',
            'field_uuid',
            'uuid',
            'uuid'
        );
    }
}
