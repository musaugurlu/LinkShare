<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'started_at', 'expired_at', 'user_id'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function LinkGroups()
    {
        return $this->hasMany(LinkGroup::class);
    }

    public function getShareUrlAttribute()
    {
        return env('APP_URL','/') . env('SHARE_SUFFIX','/share') . $this->url;
    }
}
