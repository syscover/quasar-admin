<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Resource;
use Quasar\Admin\Services\ResourceService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class ResourceResolver extends CoreResolver
{
    public function __construct(Resource $model, ResourceService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
