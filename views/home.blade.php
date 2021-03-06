@extends('app')

@section('content')
<div class="container">
	<div class="row" ng-controller="TodosController">
		<div class="col-sm-6 todos">
			<div class="panel panel-default">
				<div class="panel-heading">
                    <h3>Todos @{{ remainingTodos }}</h3>
                </div>
				<div class="panel-body">
                    <form name="addTodoForm" ng-submit="addTodo(newTodo)" novalidate>
                        <div class="form-group">
                            <input type="text" ng-model="newTodo" class="form-control" placeholder="add a todo" required />
                        </div>

                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">Add task</button>
                        </div>
                    </form>
                    <hr/>
                    <ul>
                        <li ng-repeat="todo in todos">
                            @{{ todo.name }} <smal ng-show="todo.completed_at != null">(completed)</smal>
                            <a ng-show="todo.completed_at == null" ng-click="deleteTodo(todo)" href="">complete</a>
                        </li>
                        <li ng-hide="hasTodos()">Nothing to do</li>
                    </ul>
				</div>
			</div>
		</div>
        <div class="col-sm-6 done-items">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Completed tasks</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li ng-repeat="todo in completedTodos">
                            @{{ todo.name }}
                        </li>
                        <li ng-hide="hasCompletedTodos()" class="not-done">No completed tasks</li>
                    </ul>
                </div>
            </div>
        </div>
	</div>
</div>
@stop
