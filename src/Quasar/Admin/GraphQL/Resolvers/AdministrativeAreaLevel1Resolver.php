<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\AdministrativeAreaLevel1;
use Quasar\Admin\Services\AdministrativeAreaLevel1Service;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class AdministrativeAreaLevel1Resolver extends CoreResolver
{
    public function __construct(AdministrativeAreaLevel1 $model, AdministrativeAreaLevel1Service $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
