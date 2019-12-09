<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Carbon\Carbon;
use Quasar\Admin\Models\User;

class AuthService
{
    public static function validateUser(string $username, string $password)
    {
        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password))
        {
            return $user;
        }

        return null;
    }

    public static function generateTokens(User $user)
    {
        // get current time
        $date = Carbon::now();
        $key = '123456';

        $payload = [ 
            'username'  => $user->username,
            'name'      => $user->name,
            'email'     => $user->email,
            'lang'      => $user->lang,
            'iat'       => $date->format('X'),
            'nbf'       => $date->addSeconds(30)->format('X')
        ];

        $payload2 = [ 
            'username'  => $user->username,
            'name'      => $user->name,
            'email'     => $user->email,
            'lang'      => $user->lang,
            'iat'       => $date->format('X'),
            'nbf'       => $date->addSeconds(60)->format('X')
        ];

        return [
            'accessToken'   => JWT::encode($payload, $key),
            'refreshToken'  => JWT::encode($payload2, $key)
        ];
    }

    public static function me()
    {
        // 
        /* const user = <UserDto>this._authService.decode(context.req.headers.authorization.replace('Bearer ', ''));

        if (user && user.username)
        {
            return this._userService.findByUsername(user.username);
        }
        return null; */
    }

    public static function decode(string $encode)
    {
        $key = '123456';
        return JWT::decode($encode, $key, ['HS256']);
    }
}
