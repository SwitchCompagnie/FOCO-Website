<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CodeStat extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_length',
        'beautified_length',
        'original_code',
        'beautified_code',
    ];
}