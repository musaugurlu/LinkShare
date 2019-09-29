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
        'nameurl', 'link_group_id', 'user_id',
    ];

    public function LinkGroup()
    {
        return $this->belongsTo(LinkGroup::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
