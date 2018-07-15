<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend_Request extends Model
{
    protected $table="friend_requests";
    protected $fillable=['user_from','user_to'];
}
