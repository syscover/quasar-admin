<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use Quasar\Core\Services\CoreService;
use Quasar\Admin\Models\User;
use Quasar\OAuth\Services\JWTService;
use Quasar\OAuth\Models\AccessToken;

class UserService extends CoreService
{
    public function create(array $data)
    {
        $this->validate($data, [
            'uuid'          => 'nullable|uuid',
            'name'          => 'required|between:2,255',
            'surname'       => 'nullable|between:2,255',
            'email'         => 'required|email:rfc,dns|between:2,255',
            'langUuid'      => 'required|uuid|size:36|exists:admin_lang,uuid',
            'rolesUuid'     => 'nullable|array',
            'profilesUuid'  => 'nullable|array',
            'isActive'      => 'nullable|boolean',
            'username'      => 'required|between:2,255|unique:admin_user,username',
            'password'      => 'required|between:2,255'
        ]);

        // set password
        $data['password']   = Hash::make($data['password']);

        $object = User::create($data)->fresh();

        // update roles
        $object->roles()->sync($data['rolesUuid']);

        // update profiles
        $object->profiles()->sync($data['profilesUuid']);

        return $object;
    }

    public function update(array $data, string $uuid)
    {
        $this->validate($data, [
            'id'            => 'required|integer',
            'uuid'          => 'required|uuid',
            'name'          => 'between:2,255',
            'surname'       => 'between:2,255',
            'email'         => 'email:rfc,dns|between:2,255',
            'langUuid'      => 'uuid|exists:admin_lang,uuid',
            'rolesUuid'     => 'nullable|array',
            'profilesUuid'  => 'nullable|array',
            'isActive'      => 'boolean',
            'username'      => 'between:2,255|unique:admin_user,username,' . $uuid . ',uuid',
            'password'      => 'nullable|between:2,255'
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

    public function setShortcuts(array $data): array
    {
        $token = (array) JWTService::decode(request()->bearerToken());

        // get access token from database
        $accessToken = AccessToken::where('uuid', $token['jit'])
            ->where('is_revoked', false)
            ->first();

        // set data
        $userData = $accessToken->user->data;
        $userData['shortcuts'] = $data['payload'];
        $accessToken->user->data = $userData;

        $accessToken->user->save();
        
        return $data['payload'];
    }

    public function getShortcuts(): array
    {
        $token = (array) JWTService::decode(request()->bearerToken());

        // get access token from database
        $accessToken = AccessToken::where('uuid', $token['jit'])
            ->where('is_revoked', false)
            ->first();

        return $accessToken->user->data['shortcuts'] ?? [];
    }
}
