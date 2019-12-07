<?php namespace Quasar\Admin\Models;

use Quasar\Core\Models\CoreModel;
use Quasar\Admin\Traits\Langable;

/**
 * Class User
 * @package Quasar\Admin\Models
 */
class User extends CoreModel
{
    use Langable;

    protected $table        = 'admin_user';
    protected $fillable     = ['id', 'uuid', 'name', 'surname', 'email', 'lang_uuid', 'active', 'username', 'password'];
    protected $hidden       = ['password', 'remember_token'];
    protected $casts        = [
        'active' => 'boolean'
    ];
    public $with            = ['lang'];

    /**
     * Get profile from user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function profile()
    {
        // return $this->belongsTo(Profile::class, 'profile_id');
    }
}
