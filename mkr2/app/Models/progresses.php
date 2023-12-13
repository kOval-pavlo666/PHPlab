<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class progresses extends Model
{
    use HasFactory;
    protected  $fillable = ['LessonName','Mark','GetTime'];
}
