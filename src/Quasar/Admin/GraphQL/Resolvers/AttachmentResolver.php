<?php namespace Quasar\Admin\GraphQL\Resolvers;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use Quasar\Admin\Services\AttachmentService;

class AttachmentResolver
{
    public function crop($root, array $args, GraphQLContext $context, ResolveInfo $resolveInfo)
    {
        return AttachmentService::crop($args['payload']['attachment'], $args['payload']['attachmentFamily'], $args['payload']['crop']);
    }

    public function delete($root, array $args)
    {
        return AttachmentService::delete($args['attachment']);
    }
}
