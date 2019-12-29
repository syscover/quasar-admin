<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\AttachmentFamily;

class AttachmentFamilyService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'          => 'nullable|uuid',
            'resourcesUuid' => 'required|array',
            'name'          => 'required|between:2,255',
            'width'         => 'nullable|integer',
            'height'        => 'nullable|integer',
            'fitTypeUuid'   => 'nullable|uuid',
            'sizes'         => 'nullable|array',
            'quality'       => 'nullable|integer|between:1,100',
            'format'        => 'nullable|in:jpg,png,gif,tif,bmp,data-url'
        ]);

        $object = AttachmentFamily::create($data)->fresh();

        // update resources
        $object->resources()->sync($data['resourcesUuid']);

        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'            => 'required|integer',
            'uuid'          => 'required|uuid',
            'resourcesUuid' => 'required|array',
            'name'          => 'required|between:2,255',
            'width'         => 'nullable|integer',
            'height'        => 'nullable|integer',
            'fitTypeUuid'   => 'nullable|uuid',
            'sizes'         => 'nullable|array',
            'quality'       => 'nullable|integer|between:1,100',
            'format'        => 'nullable|in:jpg,png,gif,tif,bmp,data-url'
        ]);

        $object = AttachmentFamily::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        // update resources
        $object->resources()->sync($data['resourcesUuid']);

        return $object;

        return $object;
    }
}
