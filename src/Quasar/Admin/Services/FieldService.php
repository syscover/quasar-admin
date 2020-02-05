<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\DB;
use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\Field;

class FieldService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'              => 'nullable|uuid',
            'langUuid'          => 'required|uuid|exists:admin_lang,uuid',
            'fieldGroupUuid'    => 'required|uuid|exists:admin_field_group,uuid',
            'name'              => 'required|between:2,255',
            'label'             => 'required|between:2,255',
            'fieldTypeUuid'     => 'required|uuid',
            'dataTypeUuid'      => 'required|uuid',
            'isRequired'        => 'required|boolean',
            'sort'              => 'nullable|integer',
            'maxlength'         => 'nullable|integer',
            'pattern'           => 'nullable|between:2,255',
            'class'             => 'nullable|between:2,255'
        ]);

        // set label translation to new object
        $data['labels']           = [['langUuid' => $data['langUuid'], 'value' => $data['label']]];
        
        // set names of config values
        $data['fieldTypeName']  = collect(config('quasar-admin.field_types'))->where('uuid', $data['fieldTypeUuid'])->first()->name;
        $data['dataTypeName']   = collect(config('quasar-admin.data_types'))->where('uuid', $data['dataTypeUuid'])->first()->name;
        $data['dataLang']       = [$data['langUuid']];

        $object = null;

        DB::transaction(function () use ($data, &$object)
        {
            // create
            $object = Field::create($data)->fresh();

            // add data lang for element
            // $object->addDataLang($object);
        });
        
        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'                => 'required|integer',
            'uuid'              => 'nullable|uuid',
            'langUuid'          => 'required|uuid|exists:admin_lang,uuid',
            'fieldGroupUuid'    => 'required|uuid|exists:admin_field_group,uuid',
            'name'              => 'required|between:2,255',
            'labels'            => 'nullable|array',
            'fieldTypeUuid'     => 'required|uuid',
            'dataTypeUuid'      => 'required|uuid',
            'isRequired'        => 'required|boolean',
            'sort'              => 'nullable|integer',
            'maxlength'         => 'nullable|integer',
            'pattern'           => 'nullable|between:2,255',
            'class'             => 'nullable|between:2,255'
        ]);

        $object = Field::where('uuid', $uuid)->first();
        
        // set names of config values
        $data['fieldTypeName']  = collect(config('quasar-admin.field_types'))->where('uuid', $data['fieldTypeUuid'])->first()->name;
        $data['dataTypeName']   = collect(config('quasar-admin.data_types'))->where('uuid', $data['dataTypeUuid'])->first()->name;

        // update label
        if (! empty($data['label']))
        {
            $data['labels'] = collect($object->labels)->map(function($item) use ($data) {
                if ($item['langUuid'] === $data['langUuid']) $item['value'] = $data['label'];
                return $item;
            });
        }

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        return $object;
    }
}
