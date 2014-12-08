angular.module("todoApp", ['ngResource'])
    .factory('Todo', function($resource) {
        return $resource('/api/v1/todos/:id');
    })
    .controller("TodosController", function($scope, Todo) {
        $scope.newTodo = "";
        $scope.todos = [];

        function updateTodosList()
        {
            Todo.query(function(data){
                $scope.todos = data;
            });
        }

        updateTodosList();

        $scope.addTodo = function(newTodo) {
            Todo.save({name: newTodo}, function(data) {
                $scope.todos.push(data);
                $scope.newTodo = "";
            });
        };

        $scope.hasTodos = function(){
            return $scope.todos.length > 0;
        };
    });