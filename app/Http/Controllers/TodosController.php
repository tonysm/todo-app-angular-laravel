<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        $todos = Todo::all();

        return $todos;
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $todo_name = $request->json("name");

        $validation = Validator::make(["name" => $todo_name], Todo::$rules);

        if ($validation->fails())
        {
            return Response::make(["errors" => $validation->messages()], 400);
        }

        $todo = Todo::create(["name" => $todo_name]);

        return Response::make($todo, 201);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);

        $todo->delete();

        return Response::make($todo, 200);
    }
}