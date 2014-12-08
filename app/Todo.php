<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    /**
     * @var array
     */
    public static $rules = [
        "name" => "required|min:3"
    ];

    /**
     * @var array
     */
    protected $fillable = ["name"];

    /**
     * @var array
     */
    protected $dates = ["completed_at"];
} 