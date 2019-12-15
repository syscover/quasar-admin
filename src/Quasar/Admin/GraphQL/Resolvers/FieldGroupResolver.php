<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\FieldGroup;
use Quasar\Admin\Services\FieldGroupService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class FieldGroupResolver extends CoreResolver
{
    public function __construct(FieldGroup $model, FieldGroupService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
