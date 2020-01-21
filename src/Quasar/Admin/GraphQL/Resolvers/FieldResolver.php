<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Field;
use Quasar\Admin\Services\FieldService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class FieldResolver extends CoreResolver
{
    public function __construct(Field $model, FieldService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
