<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * the attribute that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * get the user that owns the task
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
