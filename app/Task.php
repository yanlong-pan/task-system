<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
        'updated_at' => 'datetime:Y/m/d',
    ];
    /**
     * Get the owner of the task
     *
     * @return void
     */
    public function owner()
    {
        return $this->belongsTo('App\User');
    }

}
