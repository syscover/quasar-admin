<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Traits\Langable;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Class User
 * @package Quasar\Admin\Models
 */
class User extends CoreModel
{
    use Langable;
    use HasRelationships;

    protected $table        = 'admin_user';
    protected $fillable     = ['uuid', 'name', 'surname', 'email', 'langUuid', 'isActive', 'username', 'password'];
    protected $hidden       = ['password', 'remember_token'];
    protected $casts        = [
        'isActive' => 'boolean'
    ];
    public $with            = ['lang', 'profiles'];

    /**
     * Get permissions from user
     */
    public function permissions()
    {
        return $this->hasManyDeep(
            Permission::class, 
            ['admin_roles_users', Role::class, 'admin_permissions_roles'], // admin_user ->  admin_roles_users -> admin_role -> admin_permissions_roles -> admin_permission
            [
                'user_uuid',        // Foreign key on the "admin_roles_users" table.       
                'uuid',             // Foreign key on the "admin_role" table (local key).
                'role_uuid',        // Foreign key on the "admin_permissions_roles" table.       
                'uuid'              // Foreign key on the "admin_permission" table.       
            ],
            [
                'uuid',             // Local key on the "admin_user" table. 
                'role_uuid',        // Local key on the "admin_roles_users" table. 
                'uuid',             // Local key on the "admin_role" table.             
                'permission_uuid'   // Local key on the "admin_permission" table.             
            ]
        );
    }

    /**
     * Get roles from user
     */
    public function roles()
    {
        return $this->belongsToMany(
            Role::class,
            'admin_roles_users',
            'user_uuid',
            'role_uuid',
            'uuid',
            'uuid'
        );
    }

    /**
     * Get profiles from user
     */
    public function profiles()
    {
        return $this->belongsToMany(
            Profile::class,
            'admin_profiles_users',
            'user_uuid',
            'profile_uuid',
            'uuid',
            'uuid'
        );
    }
}
