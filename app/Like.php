<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table="likes";
    public $fillable=['user_id','post_id'];

}
