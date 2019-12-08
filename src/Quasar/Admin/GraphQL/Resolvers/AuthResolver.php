<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Services\AuthService;
use Quasar\Core\Exceptions\AuthenticateException;


class AuthResolver
{
    public function credentials($root, array $args)
    {
        
        $user = AuthService::validateUser($args['credentials']['username'], $args['credentials']['password']);

        if (!$user) 
        {
            throw new AuthenticateException();
        }

        return AuthService::generateTokens($user);
    }
}
