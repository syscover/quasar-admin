<?php namespace Syscover\Admin\Services;

use Illuminate\Support\Str;
use Quasar\Core\Services\CoreService;
use Quasar\Core\Exceptions\ModelNotChangeException;
use Quasar\Admin\Models\Package;

class PackageService extends Service
{
    public function store(array $data)
    {
        $this->validate($data, [
            'name'      => 'required|between:2,255',
            'root'      => 'required|between:2,255',
            'active'    => 'required',
            'sort'      => 'required|integer|min:0'
        ]);

        // set uuid
        $data['uuid'] = Str::uuid();

        Package::create($data);
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'        => 'integer',
            'uuid'      => 'size:36',
            'name'      => 'between:2,255',
            'root'      => 'between:2,255',
            'sort'      => 'integer|min:0'
        ]);

        $object = Package::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}
