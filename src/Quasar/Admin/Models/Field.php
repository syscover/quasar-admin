<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Field
 * @package Quasar\Admin\Models
 */
class Field extends CoreModel
{
    protected $table        = 'admin_field';
    protected $fillable     = ['uuid', 'name', 'labels', 'fieldTypeUuid', 'sourceUuid', 'fieldTypeName', 'dataTypeUuid', 'dataTypeName', 'isRequired', 'sort', 'maxlength', 'pattern', 'class', 'dataLang', 'data'];
    protected $casts        = [
        'labels'        => 'array',
        'is_required'   => 'boolean',
        'data_lang'     => 'array',
        'data'          => 'array'
    ];
    public $with            = ['values', 'fieldGroups'];

    public function values()
    {
        return $this->hasMany(FieldValue::class, 'field_uuid', 'uuid');
    }

    public function fieldGroups()
    {
        return $this->belongsToMany(
            FieldGroup::class,
            'admin_field_groups_fields',
            'field_uuid',
            'field_group_uuid',
            'uuid',
            'uuid',
        );
    }

    public function deleteTranslationRecord($uuid, $langUuid)
    {
        $field = Field::find($uuid);

        $field->labels = collect($field->labels)->filter(function($value, $key) use ($langUuid) {
            return $value['langUuid'] !== $langUuid;
        });

        $field->save();
    }
}
