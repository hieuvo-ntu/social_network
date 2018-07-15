<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table="messages";
    public $timestamps=false;
    public $fillable=['content','user_from','user_to'];
}
