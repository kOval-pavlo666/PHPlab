<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;

    protected $fillable = ['fullName', 'position', 'salary', 'childrenQuantity', 'experience', 'creator_user_id'];
}
