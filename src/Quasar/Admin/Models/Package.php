<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Package
 * @package Quasar\Admin\Models
 */

class Package extends CoreModel
{
	protected $table        = 'admin_package';
    protected $fillable     = ['uuid', 'name', 'root', 'sort', 'isActive'];
    protected $casts        = [
        'is_active' => 'boolean'
    ];
}
