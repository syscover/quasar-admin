<?php namespace Quasar\Admin\GraphQL\Resolvers;

use Quasar\Admin\Models\AttachmentFamily;
use Quasar\Admin\Services\AttachmentFamilyService;
use Quasar\Core\GraphQL\Resolvers\CoreResolver;

class AttachmentFamilyResolver extends CoreResolver
{
    public function __construct(AttachmentFamily $model, AttachmentFamilyService $service)
    {
        $this->model = $model;
        $this->service = $service;
    }
}
