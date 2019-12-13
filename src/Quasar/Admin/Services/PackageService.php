<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Package;

class PackageService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'      => 'nullable|uuid',
            'name'      => 'required|between:2,255',
            'root'      => 'required|between:2,255',
            'sort'      => 'required|integer|min:0',
            'isActive'  => 'nullable|boolean',
        ]);

        return Package::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'        => 'required|integer',
            'uuid'      => 'required|uuid',
            'name'      => 'between:2,255',
            'root'      => 'between:2,255',
            'sort'      => 'integer|min:0',
            'isActive'  => 'boolean',
        ]);

        $object = Package::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
