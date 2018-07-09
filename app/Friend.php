<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $table="friends";
    protected $fillable=['user_1_id','user_2_id','status'];
}
