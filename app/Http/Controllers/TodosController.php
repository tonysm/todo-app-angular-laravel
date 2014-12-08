<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class TodosController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
	public function index()
	{
        $todos = Todo::orderBy("completed_at", "ASC")->get();

        return $todos;
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
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
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$todo = Todo::find($id);

        $todo->completed_at = Carbon::now();
        $todo->save();

        return Response::make($todo, 200);
	}
}
