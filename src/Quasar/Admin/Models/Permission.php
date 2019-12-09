<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Permission
 * @package Quasar\Admin\Models
 */

class Permission extends CoreModel
{
    protected $table        = 'admin_permission';
    protected $fillable     = ['id', 'uuid', 'name', 'packageUuid'];
    public $with            = ['package'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_uuid', 'uuid');
    }
}
