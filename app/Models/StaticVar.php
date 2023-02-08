<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticVar extends Model
{
    use HasFactory;

    protected $fillable = ['min_confidence', 'min_support'];
}
