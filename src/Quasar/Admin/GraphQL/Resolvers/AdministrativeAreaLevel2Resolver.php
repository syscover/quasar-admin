<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\AdministrativeAreaLevel2;
use Quasar\Admin\Services\AdministrativeAreaLevel2Service;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class AdministrativeAreaLevel2Resolver extends CoreResolver
{
    public function __construct(AdministrativeAreaLevel2 $model, AdministrativeAreaLevel2Service $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
