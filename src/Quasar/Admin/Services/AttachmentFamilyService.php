<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\AttachmentFamily;

class AttachmentFamilyService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'          => 'nullable|uuid',
            'resourceUuid'  => 'required|uuid|exists:admin_resource,uuid',
            'name'          => 'required|between:2,255',
            'width'         => 'nullable|integer',
            'height'        => 'nullable|integer',
            'fitTypeUuid'   => 'nullable|uuid',
            'sizes'         => 'nullable|array',
            'quality'       => 'nullable|integer|between:1,100',
            'format'        => 'nullable|in:jpg,png,gif,tif,bmp,data-url'
        ]);

        return AttachmentFamily::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'            => 'required|integer',
            'uuid'          => 'required|uuid',
            'resourceUuid'  => 'required|exists:admin_resource,uuid',
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

        return $object;
    }
}
