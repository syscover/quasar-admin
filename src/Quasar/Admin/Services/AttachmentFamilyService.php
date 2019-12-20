<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\Service;
use Quasar\Core\Exceptions\ModelNotChangeException;
use Quasar\Admin\Models\AttachmentFamily;

class AttachmentFamilyService extends Service
{
    public function store(array $data)
    {
        $this->validate($data, [
            'resourceUuid'  => 'required|exists:admin_resource,id',
            'name'          => 'required|between:2,255',
            'width'         => 'nullable|integer',
            'height'        => 'nullable|integer',
            'fitType'       => 'nullable|integer|in:1,2,3,4,5',
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
            'resourceUuid'  => 'required|exists:admin_resource,id',
            'name'          => 'required|between:2,255',
            'width'         => 'nullable|integer',
            'height'        => 'nullable|integer',
            'fitType'       => 'nullable|integer|in:1,2,3,4,5',
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
