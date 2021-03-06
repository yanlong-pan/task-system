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

    public function getDeadlineAttribute($value)
    {
        return (new \DateTime($value))->format('Y-m-d\TH:i:s');
    }

    public function setDeadlineAttribute($value)
    {
        $this->attributes['deadline'] = (new \DateTime($value))->format('Y-m-d H:i:s');
    }

    public function humanReadableDeadline()
    {
        $glue = $this->isDdlPassed() ? "after" : "before";
        return (new \DateTime($this->deadline))->diff(now())->format("%d days, %h hours and %i minuts {$glue} due");
    }

    public function isDdlPassed()
    {
        return strtotime(now()) > strtotime($this->deadline);
    }
}
