<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMatch extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    protected $hidden = [
        'partner_id',
        'updated_at',
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function match()
    {
        return $this->belongsTo(Match::class);
    }
}
