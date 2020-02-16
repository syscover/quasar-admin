<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Role;

class RoleService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'      => 'nullable|uuid',
            'name'      => 'required|between:2,255',
            'isMaster'  => 'nullable|boolean',
        ]);

        $object = null;

        DB::transaction(function () use ($data, &$object)
        {
            $object = Role::create($data)->fresh();

            // create permissions
            $object->permissions()->sync($data['permissionsUuid']);
        });

        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'        => 'required|integer',
            'uuid'      => 'required|uuid',
            'name'      => 'between:2,255',
            'isMaster'  => 'nullable|boolean',
        ]);

        $object = Role::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        DB::transaction(function () use ($data, &$object)
        {
            // save changes
            $object->save();

            // update permissions
            $object->permissions()->sync($data['permissionsUuid']);
        });

        return $object;
    }
}
