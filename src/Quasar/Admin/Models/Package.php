<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Package
 * @package Quasar\Admin\Models
 */

class Package extends CoreModel
{
	protected $table        = 'admin_package';
    protected $fillable     = ['id', 'uuid', 'name', 'root', 'active', 'sort'];
    protected $casts        = [
        'active' => 'boolean'
    ];
}
