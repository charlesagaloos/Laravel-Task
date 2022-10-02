<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    public $table ="announcement";
    protected $primaryKey ="id";
    protected $fillable = ['start_date','end_date','title','content'];
}
