<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'user_id',
    ];

    public function LinkGroups()
    {
        return $this->belongsToMany(LinkGroup::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
