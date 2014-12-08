<?php

use App\Todo;

class TodosTest extends TestCase {
    /**
     * @param $method
     * @param $uri
     * @param array $payload
     * @return \Illuminate\Http\Response
     */
    private function callJSON($method, $uri, array $payload = [])
    {
        return $this->call($method, $uri, [], [], [], ['Content-Type' => "application/json"], json_encode($payload));
    }

    function invalidTodos()
    {
        return [
            [["name" => ""]],
            [[]],
            [["name" => '12']]
        ];
    }

    /** @test */
    function it_should_create_todos()
    {
        $response = $this->callJSON("POST", "api/v1/todos", ["name" => "lorem ipsum"]);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertCount(1, Todo::all());
    }

    /**
     * @dataProvider invalidTodos
     * @test
     */
    function it_should_not_allow_creating_a_todo_task_without_name($data)
    {
        $response = $this->callJSON("POST", "api/v1/todos", $data);

        $this->assertEquals(400, $response->getStatusCode());
        $this->assertCount(0, Todo::all());
    }
}