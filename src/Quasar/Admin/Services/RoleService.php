<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Core\Exceptions\ModelNotChangeException;
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

        $object = Role::create($data)->fresh();

        // create permissions
        $object->permissions()->sync($data['permissionsUuid']);

        return $object;
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'        => 'required|integer',
            'uuid'      => 'required|uuid',
            'name'      => 'between:2,255',
            'isMaster'  => 'nullable|boolean',
        ]);

        $object = Role::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        // update permissions
        $object->permissions()->sync($data['permissionsUuid']);

        return $object;
    }
}
