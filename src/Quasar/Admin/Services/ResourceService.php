<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Resource;

class ResourceService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'              => 'nullable|uuid',
            'packageUuid'       => 'required|uuid|exists:admin_package,uuid',
            'name'              => 'required|between:2,255',
            'hasCustomFields'   => 'nullable|boolean',
            'hasAttachments'    => 'nullable|boolean',
        ]);

        return Resource::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                => 'required|integer',
            'uuid'              => 'required|uuid',
            'packageUuid'       => 'uuid|exists:admin_package,uuid',
            'name'              => 'between:2,255',
            'hasCustomFields'   => 'boolean',
            'hasAttachments'    => 'boolean',
        ]);

        $object = Resource::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
