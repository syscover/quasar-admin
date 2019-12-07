<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\User;
use Quasar\Admin\Services\UserService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class UserResolver extends CoreResolver
{
    public function __construct(User $model, UserService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
