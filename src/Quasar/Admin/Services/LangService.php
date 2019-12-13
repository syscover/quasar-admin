<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Lang;

class LangService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'      => 'nullable|uuid',
            'name'      => 'required|between:2,255',
            'image'     => 'nullable|between:2,255',
            'iso6392'   => 'required|size:2',
            'iso6393'   => 'required|size:3',
            'ietf'      => 'required|size:5',
            'sort'      => 'nullable|min:0|integer',
            'isActive'  => 'nullable|boolean'
        ]);

        return Lang::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'        => 'required|integer',
            'uuid'      => 'required|uuid',
            'name'      => 'between:2,255',
            'image'     => 'between:2,255',
            'iso6392'   => 'size:2',
            'iso6393'   => 'size:3',
            'ietf'      => 'size:5',
            'sort'      => 'min:0|integer',
            'isActive'  => 'boolean'
        ]);

        $object = Lang::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
