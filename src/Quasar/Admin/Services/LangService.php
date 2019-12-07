<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Str;
use Quasar\Core\Services\CoreService;
use Quasar\Core\Exceptions\ModelNotChangeException;
use Quasar\Admin\Models\Lang;

class LangService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'name'      => 'required|between:2,255',
            'image'     => 'between:2,255',
            'iso_639_2' => 'size:2',
            'iso_639_3' => 'size:3',
            'ietf'      => 'size:5',
            'sort'      => 'min:0|integer',
            'active'    => 'boolean'
        ]);
        
        // set uuid
        $data['uuid'] = Str::uuid();

        return Lang::create($data)->fresh();
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'id'        => 'required|integer',
            'uuid'      => 'required|size:36',
            'name'      => 'between:2,255',
            'image'     => 'between:2,255',
            'iso_639_2' => 'size:2',
            'iso_639_3' => 'size:3',
            'ietf'      => 'size:5',
            'sort'      => 'min:0|integer',
            'active'    => 'boolean'
        ]);

        $object = Lang::findOrFail($id);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}
