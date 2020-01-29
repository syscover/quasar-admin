<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Country;
use Quasar\Admin\Services\CountryService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class CountryResolver extends CoreResolver
{
    public function __construct(Country $model, CountryService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
