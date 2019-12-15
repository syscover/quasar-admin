<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\FieldGroup;

class FieldGroupService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'          => 'nullable|uuid',
            'name'          => 'required|between:2,255',
            'resourceUuid'  => 'required|uuid|exists:admin_resource,uuid',
        ]);

        return FieldGroup::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'            => 'required|integer',
            'uuid'          => 'required|uuid',
            'name'          => 'between:2,255',
            'resourceUuid'  => 'uuid|exists:admin_resource,uuid',
        ]);

        $object = FieldGroup::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
