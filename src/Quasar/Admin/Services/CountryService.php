<?php namespace Quasar\Admin\Services;

use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Country;

class CountryService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'                      => 'nullable|uuid',
            'commonUuid'                => 'nullable|uuid',
            'langUuid'                  => 'required|uuid|exists:admin_lang,uuid',
            'iso3166Alpha2'             => 'required|alpha|size:2',
            'iso3166Alpha3'             => 'required|alpha|size:3',
            'iso3166Numeric'            => 'required|size:3',
            'customCode'                => 'nullable|between:1,10',
            'prefix'                    => 'nullable|between:1,5',
            'name'                      => 'required|between:2,255',
            'slug'                      => 'required|between:1,255',
            'sort'                      => 'nullable|integer',
            'administrativeAreaLevel1'  => 'nullable|between:1,50',
            'administrativeAreaLevel2'  => 'nullable|between:1,50',
            'administrativeAreaLevel3'  => 'nullable|between:1,50',
            'latitude'                  => 'nullable|numeric',
            'longitude'                 => 'nullable|numeric',
            'zoom'                      => 'nullable|integer',
            'administrativeAreas'       => 'nullable|array'
        ]);

        // create commonUuid
        $data['commonUuid'] = Str::uuid();
        $object = null;

        DB::transaction(function () use ($data, &$object)
        {
            // create
            $object = Country::create($data)->fresh();

            // add data lang for element
            $object->addDataLang($object);
        });

        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                        => 'required|integer',
            'uuid'                      => 'nullable|uuid',
            'commonUuid'                => 'nullable|uuid',
            'langUuid'                  => 'required|uuid|exists:admin_lang,uuid',
            'iso3166Alpha2'             => 'required|alpha|size:2',
            'iso3166Alpha3'             => 'required|alpha|size:3',
            'iso3166Numeric'            => 'required|size:3',
            'customCode'                => 'nullable|between:1,10',
            'prefix'                    => 'nullable|between:1,5',
            'name'                      => 'required|between:2,255',
            'slug'                      => 'required|between:1,255',
            'sort'                      => 'nullable|integer',
            'administrativeAreaLevel1'  => 'nullable|between:1,50',
            'administrativeAreaLevel2'  => 'nullable|between:1,50',
            'administrativeAreaLevel3'  => 'nullable|between:1,50',
            'administrativeAreas'       => 'nullable|array',
            'latitude'                  => 'nullable|numeric',
            'longitude'                 => 'nullable|numeric',
            'zoom'                      => 'nullable|integer',
        ]);

        $object = null;

        DB::transaction(function () use ($data, $uuid, &$object)
        {
            $object = Country::where('uuid', $uuid)->first();

            // fill data
            $object->fill($data);

            // save changes
            $object->save();
        });

        return $object;
    }
}
