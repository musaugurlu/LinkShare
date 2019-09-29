<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'User_Id','S1'
    ];

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
