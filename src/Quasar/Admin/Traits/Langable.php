<?php namespace Quasar\Admin\Traits;

use Quasar\Admin\Models\Lang;

trait Langable
{
    public function lang()
    {
        return $this->belongsTo(Lang::class, 'lang_uuid', 'uuid');
    }
}
