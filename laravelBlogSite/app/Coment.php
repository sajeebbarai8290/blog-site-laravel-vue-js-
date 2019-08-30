<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coment extends Model
{
    protected $fillable = ['visitor_id','blog_id','comment'];
}
