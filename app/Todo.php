<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    /**
     * @var array
     */
    public static $rules = [
        "name" => "required|min:3"
    ];

    private $transformer = "App\\Todos\\TodoTransformer";

    /**
     * @var array
     */
    protected $fillable = ["name"];

    /**
     * @var array
     */
    protected $dates = ["completed_at"];

    /**
     * @return string
     */
    public function getTransformer()
    {
        return $this->transformer;
    }
} 