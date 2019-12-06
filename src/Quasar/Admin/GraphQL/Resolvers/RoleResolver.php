<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Role;
use Quasar\Admin\Services\RoleService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class RoleResolver extends CoreResolver
{
    public function __construct(Role $model, RoleService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
