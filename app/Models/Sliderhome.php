<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sliderhome extends Model
{
    use HasFactory;
    protected $table= 'sliderhomes';
    protected $guarded = [] ;
    protected $dates=['created_at'];
}
