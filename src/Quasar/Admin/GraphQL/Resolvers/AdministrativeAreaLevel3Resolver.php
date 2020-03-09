<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\AdministrativeAreaLevel3;
use Quasar\Admin\Services\AdministrativeAreaLevel3Service;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class AdministrativeAreaLevel3Resolver extends CoreResolver
{
    public function __construct(AdministrativeAreaLevel3 $model, AdministrativeAreaLevel3Service $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
