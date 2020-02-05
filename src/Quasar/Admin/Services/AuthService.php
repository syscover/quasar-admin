<?php namespace Quasar\Admin\Services;

use Illuminate\Support\Facades\Hash;
use Firebase\JWT\JWT;
use Carbon\Carbon;
use Quasar\Admin\Models\User;

class AuthService
{
    public static function validateUser(string $username, string $password): ?User
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

        $accessTokenPayload = [ 
            'username'  => $user->username,
            'name'      => $user->name,
            'email'     => $user->email,
            'lang'      => $user->lang,
            'iss'       => 'Quasar',
            'iat'       => $date->format('U'),
            'nbf'       => $date->format('U'),
            'exp'       => $date->addSeconds(3000)->format('U')
        ];

        $refreshTokenPayload = [ 
            'username'  => $user->username,
            'name'      => $user->name,
            'email'     => $user->email,
            'lang'      => $user->lang,
            'iss'       => 'Quasar',
            'iat'       => $date->format('U'),
            'nbf'       => $date->format('U'),
            'exp'       => $date->addSeconds(6000)->format('U')
        ];

        return [
            'accessToken'   => JWT::encode($accessTokenPayload, self::key()),
            'refreshToken'  => JWT::encode($refreshTokenPayload, self::key())
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
        return JWT::decode($encode, self::key(), ['HS256']);
    }

    private static function key()
    {
        return substr(config('app.key'), 7);
    }
}
