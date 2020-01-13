<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Profile
 * @package Quasar\Admin\Models
 */

class Profile extends CoreModel
{
    protected $table        = 'admin_profile';
    protected $fillable     = ['uuid', 'name'];
}
