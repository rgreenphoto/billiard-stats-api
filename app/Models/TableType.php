<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TableType extends Model
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

    public function setFullNameAttribute()
    {
        $this->attributes['full_name'] = $this->name." ".$this->size;
    }
}
