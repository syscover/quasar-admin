<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Str;
use Quasar\Core\Services\CoreService;
use Quasar\Core\Exceptions\ModelNotChangeException;
use Quasar\Admin\Models\Permission;

class PermissionService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'name'          => 'required|between:2,255',
            'package_uuid'  => 'required|uuid|size:36|exists:admin_package,uuid',
        ]);

        // set uuid
        $data['uuid'] = Str::uuid();

        return Permission::create($data)->fresh();
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'            => 'required|integer',
            'uuid'          => 'required|size:36',
            'name'          => 'between:2,255',
            'package_uuid'  => 'uuid|size:36|exists:admin_package,uuid',
        ]);

        $object = Permission::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}