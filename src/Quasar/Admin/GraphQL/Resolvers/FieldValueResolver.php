<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\FieldValue;
use Quasar\Admin\Services\FieldValueService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class FieldValueResolver extends CoreResolver
{
    public function __construct(FieldValue $model, FieldValueService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
