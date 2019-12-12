<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Role
 * @package Quasar\Admin\Models
 */

class Role extends CoreModel
{
    protected $table        = 'admin_role';
    protected $fillable     = ['id', 'uuid', 'name', 'isMaster'];
    public $with            = ['permissions'];

    /**
     * Get permissions from role
     */
    public function permissions()
    {
        return $this->belongsToMany(
            Role::class,
            'admin_permissions_roles',
            'role_uuid',
            'permission_uuid',
            'uuid',
            'uuid'
        );
    }
}
