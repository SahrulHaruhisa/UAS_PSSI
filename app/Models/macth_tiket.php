<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class macth_tiket extends Model
{
    use HasFactory;
    protected $table= 'macth_tikets';
    protected $guarded = [] ;
    protected $dates=['created_at'];
}
