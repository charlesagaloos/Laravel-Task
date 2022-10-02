<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnnouncementImage extends Model
{
    public $table ="announcement_images";
    protected $primaryKey ="id";
    protected $fillable = ['announcement_id','content','filename'];
}
