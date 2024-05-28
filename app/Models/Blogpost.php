<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogpost extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected function serializeDate($date)
    {
        return $date->format('Y-F-d   h:i');
    }
    protected $casts =[
        'share' => 'boolean',
        'save_category_others' => 'boolean',
    ];
}
