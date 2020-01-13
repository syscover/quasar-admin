<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Illuminate\Support\Str;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Quasar\Admin\Services\AuthService;
use Quasar\Core\Exceptions\AuthenticateException;
use GraphQL\Type\Definition\ResolveInfo;
use Quasar\Admin\Models\User;

class AuthResolver
{
    public function credentials($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = AuthService::validateUser($args['credentials']['username'], $args['credentials']['password']);

        if (!$user) 
        {
            throw new AuthenticateException();
        }

        return AuthService::generateTokens($user);
    }

    public function me($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = AuthService::decode(Str::after($context->request->header('Authorization'), 'Bearer '));

        if($user && $user->username)
        {
            return User::where('username', $user->username)->first();
        }
        return null;
    }

    public function permissions($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        $user = AuthService::decode(Str::after($context->request->header('Authorization'), 'Bearer '));

        if($user && $user->username)
        {
            return User::where('username', $user->username)->first()->permissions;
        }
    }
}
