@extends('app')
        <!--AngularJS-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

@section('content')
    <div class="container" ng-app="todoApp" ng-controller="todoController">
        <h1 style="text-align:center;" >TodoApp index view</h1>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!--<input type='text' ng-model="todo.title">-->
                <div class="form-group">
                    <input type="text" class="form-control"  ng-model="todo.title" placeholder="add todo">
                </div>
                <button class="btn btn-primary btn-md"  ng-click="addTodo(title)">Add</button>
                <i ng-show="loading" class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
        <hr>
        <div class="col-md-4 col-md-offset-4">
            <p style="text-align:center" ><% (todos | filter:{done:true}).length %> / <% todos.length %> tasks have been completed</p>
            <p></p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <% (todos | filter:{done:true}).length / todos.length * 100 %>%;">
                    <% (todos | filter:{done:true}).length / todos.length * 100  | number:1 %>% Complete
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <table class="table table-striped">
                    <tr ng-repeat='todo in todos track by $index'>
                        <td><input type="checkbox" ng-model="todo.done" ng-change="updateTodo(todo)"></td>
                        <td><% todo.title %></td>
                        <td><button class="btn btn-danger btn-xs" ng-click="deleteTodo($index)">  <span class="glyphicon glyphicon-trash" ></span></button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection