<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Package;
use Quasar\Admin\Services\PackageService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class PackageResolver extends CoreResolver
{
    public function __construct(Package $model, PackageService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
