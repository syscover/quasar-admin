<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\Lang;
use Quasar\Admin\Services\LangService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class LangResolver extends CoreResolver
{
    public function __construct(Lang $model, LangService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
