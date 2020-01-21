<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Field;

class FieldService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'              => 'nullable|uuid',
            'fieldGroupUuid'    => 'required|uuid|exists:admin_field_group,uuid',
            'name'              => 'required|between:2,255',
            'labels'            => 'nullable|array',
            'fieldTypeUuid'     => 'required|uuid',
            'fieldTypeName'     => 'required|between:2,255',
            'dataTypeUuid'      => 'required|uuid',
            'dataTypeName'      => 'required|between:2,255',
            'required'          => 'required|boolean',
            'sort'              => 'nullable|integer',
            'maxlength'         => 'nullable|integer',
            'pattern'           => 'nullable|between:2,255',
            'class'             => 'nullable|between:2,255'
        ]);

        $object = null;

        DB::transaction(function () use ($data, &$object)
        {
            // create
            $object = Field::create($data)->fresh();

            // add data lang for element
            $object->addDataLang($object);
        });
        
        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                => 'required|integer',
            'uuid'              => 'nullable|uuid',
            'fieldGroupUuid'    => 'required|uuid|exists:admin_field_group,uuid',
            'name'              => 'required|between:2,255',
            'labels'            => 'nullable|array',
            'fieldTypeUuid'     => 'required|uuid',
            'fieldTypeName'     => 'required|between:2,255',
            'dataTypeUuid'      => 'required|uuid',
            'dataTypeName'      => 'required|between:2,255',
            'required'          => 'required|boolean',
            'sort'              => 'nullable|integer',
            'maxlength'         => 'nullable|integer',
            'pattern'           => 'nullable|between:2,255',
            'class'             => 'nullable|between:2,255'
        ]);

        $object = Field::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
