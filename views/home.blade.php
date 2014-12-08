@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="panel panel-default" ng-controller="TodosController">
				<div class="panel-heading">
                    <h3>Todos</h3>

                    <form class="form-inline" name="addTodoForm" ng-submit="addTodo(newTodo)" novalidate>
                        <div class="form-group">
                        <input type="text" ng-model="newTodo" class="form-control" placeholder="add a todo" required />

                        <button class="btn btn-sm btn-primary">Add</button>
                        </div>
                    </form>
                </div>
				<div class="panel-body">
                    <ul ng-show="hasTodos()">
                        <li ng-repeat="todo in todos">@{{ todo.name }}</li>
                    </ul>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
