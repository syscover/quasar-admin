<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Permission;

class PermissionService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'          => 'nullable|uuid',
            'name'          => 'required|between:2,255',
            'packageUuid'   => 'required|uuid|exists:admin_package,uuid',
        ]);

        return Permission::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'            => 'required|integer',
            'uuid'          => 'required|uuid',
            'name'          => 'between:2,255',
            'packageUuid'   => 'uuid|exists:admin_package,uuid',
        ]);

        $object = Permission::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
