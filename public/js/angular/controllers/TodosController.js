angular.module("todoApp").controller("TodosController", function($scope, Todo) {
    $scope.newTodo = "";
    $scope.todos = [];

    Todo.query(function(data){
        $scope.todos = data;
    });

    $scope.addTodo = function(newTodo) {
        Todo.save({name: newTodo}, function(todo) {
            $scope.todos.unshift(todo);
            $scope.newTodo = "";
        });
    };

    $scope.deleteTodo = function(todo){
        Todo.delete(todo, function(todo) {
            for (var i = 0; i < $scope.todos.length; i++)
            {
                if ($scope.todos[i].id == todo.id)
                {
                    $scope.todos.splice(i, 1);
                    break;
                }
            }
        });
    };

    $scope.hasTodos = function(){
        return $scope.todos.length > 0;
    };
});