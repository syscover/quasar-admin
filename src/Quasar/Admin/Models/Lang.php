<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Lang
 * @package Quasar\Admin\Models
 */

class Lang extends CoreModel
{
    protected $table        = 'admin_lang';
    protected $fillable     = ['id', 'uuid', 'name', 'image', 'iso_639_2', 'iso_639_3', 'ietf', 'sort', 'is_active'];
    protected $casts        = [
        'active' => 'boolean'
    ];
}
