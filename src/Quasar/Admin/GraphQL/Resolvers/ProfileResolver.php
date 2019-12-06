<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Profile;
use Quasar\Admin\Services\ProfileService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class ProfileResolver extends CoreResolver
{
    public function __construct(Profile $model, ProfileService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
