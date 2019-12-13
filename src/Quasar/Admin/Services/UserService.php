<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\User;

class UserService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'      => 'nullable|uuid',
            'name'      => 'required|between:2,255',
            'surname'   => 'nullable|between:2,255',
            'email'     => 'required|email:rfc,dns|between:2,255',
            'langUuid'  => 'required|uuid|size:36|exists:admin_lang,uuid',
            'isActive'  => 'nullable|boolean',
            'username'  => 'required|between:2,255',
            'password'  => 'required|between:2,255'
        ]);

        // set password
        $data['password']   = Hash::make($data['password']);

        return User::create($data)->fresh();
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'        => 'required|integer',
            'uuid'      => 'required|uuid',
            'name'      => 'between:2,255',
            'surname'   => 'between:2,255',
            'email'     => 'email:rfc,dns|between:2,255',
            'langUuid'  => 'uuid|exists:admin_lang,uuid',
            'isActive'  => 'boolean',
            'username'  => 'between:2,255',
            'password'  => 'nullable|between:2,255'
        ]);

        $object = User::where('uuid', $uuid)->first();

        // check if there is password
        if ($data['password'] ?? false) $data['password'] = Hash::make($data['password']); else Arr::forget($data, 'password');

        // fill data
        $object->fill($data);

        // save changes
        $object->save();

        // update roles
        $object->roles()->sync($data['rolesUuid']);

        // update profiles
        $object->profiles()->sync($data['profilesUuid']);

        return $object;
    }
}
