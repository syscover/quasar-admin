<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Resource
 * @package Quasar\Admin\Models
 */

class Resource extends CoreModel
{
    protected $table        = 'admin_resource';
    protected $fillable     = ['id', 'uuid', 'packageUuid', 'name', 'hasFieldGroup'];
    public $with            = ['package'];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_uuid', 'uuid');
    }
}
