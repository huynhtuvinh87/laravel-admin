<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Page extends Model
{
    use HasFactory;

    protected $table = 'pages';

    protected $guarded = [];


    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($model) {
    //         $model->setAttribute('id', Str::uuid());
    //     });
    // }
}
