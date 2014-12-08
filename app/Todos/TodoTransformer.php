<?php

namespace App\Todos;

use App\Todo;
use League\Fractal\TransformerAbstract;

class TodoTransformer extends TransformerAbstract {
    public function transform(Todo $todo)
    {
        return [
            'id' => (int) $todo->id,
            'name' => $todo->name,
            'completed' => $todo->completed_at ? true : false,
            'completed_at' => $todo->completed_at ? $todo->completed_at->format('Y-m-d') : null,
            'created_at' => $todo->created_at->format('Y-m-d'),
            'updated_at' => $todo->updated_at->format('Y-m-d'),
            'links' => [
                'rel' => 'self',
                'uri' => '/api/v1/todos/' . $todo->id
            ]
        ];
    }
} 