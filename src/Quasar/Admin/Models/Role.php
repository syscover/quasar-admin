<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Role
 * @package Quasar\Admin\Models
 */

class Role extends CoreModel
{
    protected $table        = 'admin_role';
    protected $fillable     = ['uuid', 'name'];
}
