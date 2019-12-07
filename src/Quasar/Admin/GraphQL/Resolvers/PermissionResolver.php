<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Permission;
use Quasar\Admin\Services\PermissionService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class PermissionResolver extends CoreResolver
{
    public function __construct(Permission $model, PermissionService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
