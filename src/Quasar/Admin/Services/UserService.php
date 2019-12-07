<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Quasar\Core\Services\CoreService;
use Quasar\Core\Exceptions\ModelNotChangeException;
use Quasar\Admin\Models\User;

class UserService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'name'      => 'required|between:2,255',
            'surname'   => 'between:2,255',
            'email'     => 'required|email:rfc,dns|between:2,255',
            'lang_uuid' => 'required|uuid|size:36|exists:admin_lang,uuid',
            'active'    => 'boolean',
            'username'  => 'required|between:2,255',
            'password'  => 'required|between:2,255'
        ]);

        // set uuid
        $data['uuid']       = Str::uuid();
        $data['password']   = Hash::make($data['password']);

        return User::create($data)->fresh();
    }

    public function update(array $data, int $id)
    {
        $this->validate($data, [
            'name'      => 'required|between:2,255',
            'surname'   => 'between:2,255',
            'email'     => 'required|email:rfc,dns|between:2,255',
            'lang_uuid' => 'required|uuid|size:36|exist:admin_lang,uuid',
            'active'    => 'boolean',
            'username'  => 'required|between:2,255',
            'password'  => 'between:2,255'
        ]);

        $object = User::findOrFail($id);

        // check if there is password
        if ($data['password'] ?? false) $data['password'] = Hash::make($data['password']);

        $object->fill($data);

        // check is model
        if ($object->isClean()) throw new ModelNotChangeException('At least one value must change');

        // save changes
        $object->save();

        return $object;
    }
}
