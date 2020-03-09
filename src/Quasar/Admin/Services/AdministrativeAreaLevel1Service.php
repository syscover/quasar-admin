<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\DB;
use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\AdministrativeAreaLevel1;

class AdministrativeAreaLevel1Service extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                      => 'nullable|uuid',
            'countryCommonUuid'         => 'required|uuid|exists:admin_country,common_uuid',
            'code'                      => 'required|between:1,8',
            'customCode'                => 'nullable|between:1,10',
            'name'                      => 'required|between:2,255',
            'slug'                      => 'required|between:1,255'
        ]);

        // create
        return AdministrativeAreaLevel1::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                        => 'required|integer',
            'uuid'                      => 'required|uuid',
            'countryCommonUuid'         => 'required|uuid|exists:admin_country,common_uuid',
            'code'                      => 'required|between:1,8',
            'customCode'                => 'nullable|between:1,10',
            'name'                      => 'required|between:2,255',
            'slug'                      => 'required|between:1,255'
        ]);

        $object = null;

        DB::transaction(function () use ($data, $uuid, &$object)
        {
            $object = AdministrativeAreaLevel1::where('uuid', $uuid)->first();

            // fill data
            $object->fill($data);

            // save changes
            $object->save();
        });

        return $object;
    }
}
