<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;

/**
 * Class Lang
 * @package Quasar\Admin\Models
 */

class Lang extends CoreModel
{
    protected $table        = 'admin_lang';
    protected $fillable     = ['uuid', 'name', 'image', 'iso6392', 'iso6393', 'ietf', 'sort', 'isActive'];
    protected $maps         = ['iso_639_2' => 'iso6392', 'iso_639_3' => 'iso6393'];
    protected $casts        = [
        'active' => 'boolean'
    ];
}
