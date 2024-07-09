<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil_pertandingan extends Model
{
    use HasFactory;
    protected $table= 'hasil_pertandingans';
    protected $guarded = [] ;
    protected $dates=['created_at'];
}
