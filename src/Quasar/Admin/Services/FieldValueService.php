<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\FieldValue;

class FieldValueService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'              => 'nullable|uuid',
            'commonUuid'        => 'nullable|uuid',
            'code'              => 'nullable|between:1,50',
            'langUuid'          => 'required|uuid|exists:admin_lang,uuid',
            'fieldUuid'         => 'required|uuid|exists:admin_field,uuid',
            'name'              => 'required|between:2,255',
            'sort'              => 'nullable|integer',
            'isFeatured'        => 'required|boolean'
        ]);

        // create commonUuid if not exist
        $data['commonUuid'] = $data['commonUuid'] ?? Str::uuid();
        $data['uuid']       = $data['uuid'] ?? Str::uuid();
        $data['code']       = $data['code'] ?? $data['uuid'];
        $object = null;

        DB::transaction(function () use ($data, &$object)
        {
            // create
            $object = FieldValue::create($data)->fresh();

            // add data lang for element
            $object->addDataLang();
        });
        
        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                => 'required|integer',
            'uuid'              => 'nullable|uuid',
            'commonUuid'        => 'nullable|uuid',
            'code'              => 'nullable|between:1,50',
            'langUuid'          => 'required|uuid|exists:admin_lang,uuid',
            'fieldUuid'         => 'required|uuid|exists:admin_field,uuid',
            'name'              => 'required|between:2,255',
            'sort'              => 'nullable|integer',
            'isFeatured'        => 'required|boolean'
        ]);

        $data['code'] = $data['code'] ?? $uuid;
        $object = FieldValue::where('uuid', $uuid)->first();

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
