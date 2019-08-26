<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LinkGroup extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'share_id',
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Share()
    {
        return $this->belongsTo(Share::class);
    }

    public function Links()
    {
        return $this->hasMany(Link::class);
    }
}
